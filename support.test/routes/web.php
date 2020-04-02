<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
use App\Mail\ManagerAnswer;
use App\Http\Middleware\CheckAdmin;
use App\Http\Middleware\CheckUser;

Route::get('/', function () {
    return view('home');
});
//Route::get('/mail', function () {
//    Mail::to('ochev.vladimir@gmail.com')->send(new ManagerAnswer());
//    return new ManagerAnswer();
//});

Auth::routes();

Route::group(['middleware' => ['checkUser']], function(){
    Route::post('/AddRequest', 'ClientController@RequestAdd')->name('RequestAdd');
    Route::get('/AddRequest', 'ClientController@RequestAddShow')->name('RequestAddShow');
    Route::get('/MyRequests/{id}', 'ClientController@RequestsShowUser')->name('RequestsShowUser');
    Route::get('/CloseRequest{id}', 'ClientController@CloseRequest')->name('CloseRequest');
});
Route::get('/Request/{id}','ClientController@RequestShow')->name('RequestShow');
Route::post('/Response','ClientController@ResponseAdd')->name('ResponseAdd');
Route::group(['middleware' => ['checkAdmin']], function() { //добавляем посредников для проверки доступа
    Route::get('/home', 'HomeController@index')->name('home');
    Route::get('/AllRequest', 'AdminController@AllRequest')->name('AllRequest');
    Route::get('/ViwedRequest', 'AdminController@ViwedRequest')->name('ViwedRequest');
    Route::get('/NewRequest', 'AdminController@NewRequest')->name('NewRequest');
    Route::get('/AnsweredRequest', 'AdminController@AnsweredRequest')->name('AnsweredRequest');
    Route::get('/ClosedRequest', 'AdminController@ClosedRequest')->name('ClosedRequest');
});


