<?php

use Illuminate\Support\Facades\Route;
use App\Link;

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

Route::get('index', function () {
    return view('master');
});


Route::get('DeleteAPI',[
	'as'=>'DeleteAPI',
	'uses'=>'Pagecontroller@getdeleteAPI'
	]);

Route::get('DeleteDre',[
	'as'=>'DeletePre',
	'uses'=>'Pagecontroller@getdeletePre'
	]);

Route::post('save',[
	'as'=>'save',
	'uses'=>'Pagecontroller@postsave'
	]);

Route::get('exportshopifyID', 'ExportExcelIDController@exportshopifyID')->name('exportshopifyID');

Route::get('export', 'ExprotController@export')->name('export');

Route::post('importID', 'Pagecontroller@importID')->name('importID');

Route::get('Trang/{pa}',[
	'as'=>'reload',
	'uses'=>'Pagecontroller@getReload'
]);

// Route::get('/',[
// 	'as'=>'Uploadlink',
// 	'uses'=>'Pagecontroller@getUploadlink'
// ]);

Route::get('/',[
	'as'=>'data',
	'uses'=>'Pagecontroller@getdata'
]);














