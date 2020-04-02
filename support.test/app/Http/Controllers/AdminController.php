<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Response;
use Illuminate\Http\Request;
use App\Riquest;

class AdminController extends Controller
{   //контроллер отвечает за вывод всех запросов пользователей во вьюшку
    public function AllRequest(){
        $requests = Riquest::all();
        return view('ViewedRequest',['requests' => $requests,'view' => 'All Request']);

    }
    //все последующие контроллеры выводят на эран запросы пользователей
    //сортируя их по статусам, в сообветствии с названием контроллера
    public function ViwedRequest(){
        $requests = Riquest::select('id','description','statuse_id')->where('statuse_id','1')->get();
        return view('ViewedRequest',['requests' => $requests,'view' => 'Viwed Request']);

    }

    public function AnsweredRequest(){
        $requests = Riquest::select('id','description','statuse_id')->where('statuse_id','2')->get();
        return view('ViewedRequest',['requests' => $requests,'view' => 'Answered Request']);
    }

    public function ClosedRequest(){
        $requests = Riquest::select('id','description','statuse_id')->where('statuse_id','3')->get();
        return view('ViewedRequest',['requests' => $requests,'view' => 'Closed Request']);

    }


    public function NewRequest(){
        $requests = Riquest::select('id','description','statuse_id')->where('statuse_id','4')->get();
        return view('ViewedRequest',['requests' => $requests,'view' => 'New Request']);

    }
}
