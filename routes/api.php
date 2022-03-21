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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::group(['namespace' => 'App\Http\Controllers','prefix' => '/guest'], function () {

    // //Homepage Data
    // Route::get('home','ApiController@index');
    // Route::get('blogs/{start}','ApiController@blog');
    // Route::get('blogs/detail/{name}','ApiController@blogdetail');
    // Route::post('/verify/{reference}','PaystackController@dopayment');
   Route::post('/contact','ContactController@postContact');

   Route::get('/testimonies','ApiController@testimonies');
   Route::get('blogs/{start}','ApiController@blogs');
   Route::get('blogs/detail/{name}','ApiController@blogdetail');
   Route::get('/projects','ApiController@projects');
   Route::get('/projects/detail/{name}','ApiController@projectdetail');

});
