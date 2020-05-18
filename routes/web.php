<?php

use Illuminate\Support\Facades\Route;

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

//Root
Route::get('/home','HomeController@index');
//Info
Route::get('/',function(){
	return view('about');
});

//Login route
Route::get('/login','UserController@index');
Route::post('/loginProcess','UserController@process');
Route::get('/logout','UserController@logout');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

/*
	Room routing
*/
Route::get('/create_room','RoomController@create_room');
Route::post('/process','RoomController@process');
Route::get('/join_room','RoomController@join_room');
Route::get('/join_process','RoomController@join_process');
//Show room,member and admin
Route::get('/r/{id_user}/{id_room}','RoomController@show_room');

//member info routing
Route::get('/member_info/{id_member}/{id_room}','RoomController@member_info');
//tagih member routing
Route::get('/tagih/{email}','MailController@send_mail');
Route::get('/mengirim','MailController@send_process');

//Edit room (Admin)
Route::get('/er/{id_admin}/{id_room}','RoomController@edit_room');
Route::post('/e/process','RoomController@edit_process');

//Setting Ruangan Kas
Route::get('/s/{id_user}/{id_room}','KasController@setting_kas');
Route::get('/s/process','KasController@setting_process');

//Member bayar
Route::get('/b/{id_user}/{id_room}/{id_kas}','KasController@form_bayar');
Route::post('/b/process','KasController@bayar_process');

//Belum Bayar {Admin's Page}
Route::get('/d/{id_user}/{id_room}/details/{id_kas}', 'KasController@details');
Route::get('/d/{id_user}/{id_room}/lists', 'KasController@lists');

//Stats
Route::get('/stats/{id_user}/{id_room}/details','KasController@stats');