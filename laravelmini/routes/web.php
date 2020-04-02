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
//
//Route::get('/', function () {
//    return view('welcome');
//});

Route::get('/', 'IndexController@index');
Route::get('article/{id}', 'IndexController@show')->name('articleShow');// name имя роутера, по которому его можно вызвать.
Route::get('page/add','IndexController@add')->name('addComment');
Route::post('page/add','IndexController@store')->name('addStore');
Route::get('/profile', 'UserController@profile')->name('profile');
Route::post('/profile', 'UserController@update_avatar');
Route::delete('page/delete/{comment}',function (\App\Coment $comment){

//    $comment_tmp = \App\Coment::where('id', $id)->first();//эта строка выполняет запрос и создает модель
// но можно обойтись и без этого, добавив к параметру айди принимаемом в функцыю название можели
    $comment->delete();
    return redirect('page/add');
})->name('deleteComment');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
