<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

// Route::get('/', 'AsuransiController@index');

/*Route::get('home', 'HomeController@index');*/

Route::get('asuransi', 'AsuransiController@asuransi');
Route::get('about', 'AsuransiController@about');
Route::get('post', 'AsuransiController@post');
Route::get('contact', 'AsuransiController@contact');
Route::post('contact/save', 'AsuransiController@contactsave');
// Route::get('register', 'AsuransiController@register');
// Route::get('login', 'AsuransiController@login');
Route::get('asuransi/member', 'AsuransiController@memberindex');
Route::get('asuransi/member/index', 'AsuransiController@memberindex');
/*Route::get('home', 'AsuransiController@memberindex');*/
Route::get('asuransi/member/forms', 'AsuransiController@memberforms');

Route::get('asuransi/member/list', 'AsuransiController@memberlist');
Route::get('asuransi/member/list/Report', 'AsuransiController@memberlistreport');

Route::get('asuransi/member/history/permintaan', 'AsuransiController@memberhistorypermintaan');
Route::get('asuransi/member/permintaan', 'AsuransiController@memberpermintaan');
Route::post('asuransi/member/permintaan/save', 'AsuransiController@memberpermintaansave');

Route::get('asuransi/member/history/setoran', 'AsuransiController@memberhistorysetoran');
Route::get('asuransi/member/setoran', 'AsuransiController@membersetoran');
Route::post('asuransi/member/setoran/save', 'AsuransiController@membersetoransave');

Route::get('asuransi/member/histori/permintaan', 'AsuransiController@memberhistoripermintaan');
Route::get('asuransi/member/histori/permintaan/edit/{id}', 'AsuransiController@memberhistoripermintaanedit');
Route::post('asuransi/member/histori/permintaan/update', 'AsuransiController@memberhistoripermintaanupdate');
Route::get('asuransi/member/pengeluaran/Report', 'AsuransiController@memberpengeluaranreport');

Route::get('asuransi/member/histori/setoran', 'AsuransiController@memberhistorisetoran');
Route::get('asuransi/member/histori/setoran/edit/{id}', 'AsuransiController@memberhistorisetoranedit');
Route::post('asuransi/member/histori/setoran/update', 'AsuransiController@memberhistorisetoranupdate');
Route::get('asuransi/member/pemasukan/Report', 'AsuransiController@memberpemasukanreport');

Route::get('asuransi/member/histori/kritik-saran', 'AsuransiController@memberhistorikritiksaran');
Route::get('asuransi/member/histori/detail/{id}', 'AsuransiController@memberhistoridetail');
Route::get('asuransi/member/histori/detail/delete/{id}', 'AsuransiController@memberhistoridetaildelete');
Route::get('asuransi/member/histori/kritik', 'AsuransiController@memberhistorikritik');
Route::get('asuransi/member/histori/saran', 'AsuransiController@memberhistorisaran');

Route::get('asuransi/member/setting', 'AsuransiController@membersetting');
Route::get('asuransi/member/setting/edit/{id}', 'AsuransiController@membersettingedit');
Route::post('asuransi/member/setting/update', 'AsuransiController@membersettingupdate');

Route::get('asuransi/member/edit/{id}', 'AsuransiController@memberedit');
Route::get('asuransi/member/delete/{id}', 'AsuransiController@memberdelete');
Route::post('asuransi/member/edit/update', 'AsuransiController@memberupdate');
Route::get('asuransi/member/detail/{id}', 'AsuransiController@membertableshow');

Route::get('/',['as'=>'home','uses'=>'AsuransiController@index']);

/*Route::get('login','Auth\AuthController@getLogin');
Route::post('login','Auth\AuthController@postLogin');

Route::get('register','Auth\AuthController@getRegister');
Route::post('register','Auth\AuthController@postRegister');

Route::get('logout','Auth\AuthController@getLogout');*/
Route::controller('/','Auth\AuthController');

/*Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);*/
