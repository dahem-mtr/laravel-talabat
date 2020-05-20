<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::middleware('auth:api-customer')->get('/customer', function (Request $request) {
    // return $request->customer();
     $customer = auth('api-customer')->user();
    return response()->json(['customer' => $customer]);
});


Route::post('/send-verify-code', 'Api\CustomersController@Send_verification_code');
Route::post('/verify-code', 'Api\CustomersController@verify');

Route::get('companies','api\CompanyController@index');


