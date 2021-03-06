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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/test', 'testController@index')->name('test');

// dashboard routes
Route::prefix('dashboard')->group(function () {

Route::group(['middleware' => 'employee'], function () {
    Route::get('/','dashboard\DashboardController@index')->name('dashboard');
    Route::resource('orders','dashboard\OrderController');
   
    });

    Route::group(['middleware' => 'admin'], function () {
        Route::resource('users','dashboard\UserController');
        Route::resource('groups','dashboard\GroupController');
        Route::resource('companies','dashboard\CompanyController');
        Route::resource('menus','dashboard\MenuController');
        Route::resource('products','dashboard\ProductController');
        
    });
    

    }); 