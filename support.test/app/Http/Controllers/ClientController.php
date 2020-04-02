<?php

namespace App\Http\Controllers;

use App\Mail\ManagerAnswer;
use App\Mail\userAnswer;
use App\Mail\userClose;
use App\Mail\userRequest;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Response;
use Illuminate\Http\Request;
use App\Riquest;
use App\User;

class ClientController extends Controller
{
    //редирект на добавление запроса
    public function RequestAddShow(){
        return view('AddRequest');
    }
    // возвращаем все запросы юзера ему в вид
    public function RequestsShowUser($id){
        $requests = Riquest::Select(['id','description','statuse_id'])->where('user_id',$id)->get();
        return view('MyRequests', ["requests"=>$requests]);
    }
//данный метод возвращает виду определённый метод
    public function RequestShow($id){
        $request = Riquest::find($id);
        $responses = $request->response;
        if(Auth::user()->role == 'admin' && $request->statuse->status == 'new'){DB::table('riquests')->where('id',$id)->update(['statuse_id'=>'1']);}
        return view('ShowRequest',["request"=>$request,"responses"=>$responses]);
    }

// логика добавления запроса клиентом
    public function RequestAdd(Request $request){
        $this->validate($request,[
            'request'=>'required|max:1500',
            'description'=>'required|max:500'
        ]);

        $data = $request->all();
        $Quest = new Riquest;
        $Quest ->fill($data);
//        $Quest ->save();
        //Знаю, что так получать мыло администратора не совсем корректно для данной задачи
        //но к сожалению я слишком поздно понял условие задачи корректно ((
        //и реализовал систему таким образом, что администратор может быть только один.
        $user_name = $request->user()->name;
        $admins = User::Select('email')->where('role','admin')->get();
        foreach($admins as $admin){
            $admin_email = $admin->email;
        }
        $Quest->name = $user_name;
        Mail::to($admin_email)->send(new userRequest($Quest));
        return redirect('MyRequests/'.Auth::user()->id);
    }

    //закрытие запроса пользователем
    public function CloseRequest($id){
        //логика закрепления статуса закрытия за запросом
        //логика реализованна на прямую т.к. в условиях небыло сказанно
        // о добавлении новых статусов
        DB::table('riquests')->where('id',$id)->update(['statuse_id'=>'3']);
        $request = Riquest::find($id);//получаем модель закрываемого запроса
        $user = User::find($request->user_id);//получаем модель пользователя
        $request->user_name = $user->name;//добавляем в модель запроса имя пользователя для удобства;
        //отправляем письмо
        Mail::to($user->email)->send(new userClose($request));
        //делаем переадресацыю на страницу запросов пользователя
        return redirect('MyRequests/'.Auth::user()->id);

    }

    //логика ответа на запрос, метод реализует ответ как клиента так и администратора.
    public function ResponseAdd(Request $request){
        //Выполняем проверку данных из запроса
        $this->validate($request,[
            'response'=>'required|max:1500',
            'user_id'=>'required|max:11',
            'riquest_id'=>'required|max:11',
        ]);
        //обновляем статус запроса на отвеченный
        DB::table('riquests')->where('id',$request->riquest_id)->update(['statuse_id'=>'2']);
        //логика заполнения и сохрнения ответа на запрос в таблицу
        $data = $request->all();
        $response = new Response();
        $response ->fill($data);
        $response ->save();
        $request_id = $response->riquest_id;
            //логика оповещения на почту клиента
        $riquest = Riquest::find($request_id);
        $user_email = $riquest->user->email;
        $admins = User::Select('email')->where('role','admin')->get();
//        dump($response);
        foreach($admins as $admin){
            $admin_email = $admin->email;//цыкл расчитан на присутствие в таблице
        }                                //только одного администратора
        // иначе добавил бы сравнение where('id',$request->admin_id);
        //Если бы логика предусматривала наличие нескольких Менеджеров
        if (Auth::user()->role == 'admin'){
            Mail::to($user_email)->send(new ManagerAnswer($riquest));
        }else{Mail::to($admin_email)->send(new userAnswer($riquest));}
        return redirect('/Request/'.$request_id);
    }
}
