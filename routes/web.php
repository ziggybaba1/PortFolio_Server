<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers;

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
    return view('auth.login');
});
Route::middleware(['auth:sanctum', 'verified'])->get('/profile', function () {
    return view('profile.show');
})->name('profile');
Route::middleware(['auth:sanctum', 'verified'])->get('/logout', function () {
    $user = \Auth::user(); //or Auth::user()
    // Revoke current user token
    $user->tokens()->delete();
    return redirect('/');
})->name('logout');


Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', 'App\Http\Controllers\DashboardController@index')->name('dashboard');

Route::middleware(['auth:sanctum', 'verified'])->get('/projects', function () {
    return view('projects.list');
})->name('project');
Route::middleware(['auth:sanctum', 'verified'])->get('/project/add', function () {
    return view('projects.add');
})->name('project.add');


Route::middleware(['auth:sanctum', 'verified'])->get('/project/edit/{id}', 'App\Http\Controllers\ProjectController@editproject');
Route::middleware(['auth:sanctum', 'verified'])->get('/project/delete/{id}', 'App\Http\Controllers\ProjectController@deleteproject');
Route::middleware(['auth:sanctum', 'verified'])->post('/project/submit', 'App\Http\Controllers\ProjectController@addproject');
Route::middleware(['auth:sanctum', 'verified'])->post('/project/update/{id}', 'App\Http\Controllers\ProjectController@updateproject');


Route::middleware(['auth:sanctum', 'verified'])->get('/blogs', function () {
    return view('blog.list');
})->name('blog');
Route::middleware(['auth:sanctum', 'verified'])->get('/blog/add', function () {
    return view('blog.add');
})->name('blog.add');

Route::middleware(['auth:sanctum', 'verified'])->get('/blog/edit/{id}', 'App\Http\Controllers\BlogController@editblog')->name('blog.add');
Route::middleware(['auth:sanctum', 'verified'])->get('/blog/delete/{id}', 'App\Http\Controllers\BlogController@deleteblog');
Route::middleware(['auth:sanctum', 'verified'])->post('/blog/submit', 'App\Http\Controllers\BlogController@addblog');
Route::middleware(['auth:sanctum', 'verified'])->post('/blog/update/{id}', 'App\Http\Controllers\BlogController@updateblog');

Route::middleware(['auth:sanctum', 'verified'])->post('ckeditor/upload', 'App\Http\Controllers\CKEditorController@upload')->name('ckeditor.image-upload');

Route::middleware(['auth:sanctum', 'verified'])->get('/testimonies', 'App\Http\Controllers\TestimonyController@testimony')->name('testimonials');
Route::middleware(['auth:sanctum', 'verified'])->get('/testimonies/add', 'App\Http\Controllers\TestimonyController@add')->name('testimonial.add');
Route::middleware(['auth:sanctum', 'verified'])->get('/testimonies/edit/{id}', 'App\Http\Controllers\TestimonyController@edittestimony');
Route::middleware(['auth:sanctum', 'verified'])->get('/testimonies/delete/{id}', 'App\Http\Controllers\TestimonyController@deletetestimony');
Route::middleware(['auth:sanctum', 'verified'])->post('/testimonies/submit', 'App\Http\Controllers\TestimonyController@addtestimony');
Route::middleware(['auth:sanctum', 'verified'])->post('/testimonies/update/{id}', 'App\Http\Controllers\TestimonyController@updatetestimony');

Route::middleware(['auth:sanctum', 'verified'])->get('/clients', 'App\Http\Controllers\ClientController@client')->name('clients');
Route::middleware(['auth:sanctum', 'verified'])->get('/clients/add', 'App\Http\Controllers\ClientController@add')->name('clients.add');
Route::middleware(['auth:sanctum', 'verified'])->get('/clients/edit/{id}', 'App\Http\Controllers\ClientController@editclient')->name('clients.add');
Route::middleware(['auth:sanctum', 'verified'])->get('/clients/delete/{id}', 'App\Http\Controllers\ClientController@deleteclient');
Route::middleware(['auth:sanctum', 'verified'])->post('/client/submit', 'App\Http\Controllers\ClientController@addclient');
Route::middleware(['auth:sanctum', 'verified'])->post('/client/update/{id}', 'App\Http\Controllers\ClientController@updateclient');
   
Route::middleware(['auth:sanctum', 'verified'])->get('/contact','App\Http\Controllers\ContactController@contact')->name('contact');

//Social Route
Route::middleware(['auth:sanctum', 'verified'])->get('/social/instagram','App\Http\Controllers\SocialController@instagram')->name('social.insta');
Route::middleware(['auth:sanctum', 'verified'])->get('/social/twitter','App\Http\Controllers\SocialController@twitter')->name('social.twitter');
Route::middleware(['auth:sanctum', 'verified'])->get('/social/facebook','App\Http\Controllers\SocialController@facebook')->name('social.face');
Route::middleware(['auth:sanctum', 'verified'])->get('/social/linkedn','App\Http\Controllers\SocialController@linkedn')->name('social.link');
Route::middleware(['auth:sanctum', 'verified'])->get('/social/whatsapp','App\Http\Controllers\SocialController@whatsapp')->name('social.what');
Route::middleware(['auth:sanctum', 'verified'])->post('/social/update/{name}','App\Http\Controllers\SocialController@update');


//Home Page
Route::middleware(['auth:sanctum', 'verified'])->get('/pages/homepage','App\Http\Controllers\PageController@home')->name('homepage');
Route::middleware(['auth:sanctum', 'verified'])->post('/page/home/update','App\Http\Controllers\PageController@update');


//About
Route::middleware(['auth:sanctum', 'verified'])->get('/pages/about','App\Http\Controllers\PageController@about')->name('about');
Route::middleware(['auth:sanctum', 'verified'])->post('/page/about/update','App\Http\Controllers\PageController@updateabout');

//Contact
// Route::middleware(['auth:sanctum', 'verified'])->get('/contact','App\Http\Controllers\PageController@contact')->name('contact');
// Route::middleware(['auth:sanctum', 'verified'])->post('/contact','App\Http\Controllers\PageController@updatecontact');

//Settings
Route::middleware(['auth:sanctum', 'verified'])->get('/settings','App\Http\Controllers\PageController@setting')->name('settings');
Route::middleware(['auth:sanctum', 'verified'])->post('/setting','App\Http\Controllers\PageController@updatesetting');


//Verify Payment
// Route::middleware(['auth:sanctum', 'verified'], function () {
  
// })->name('plans.add');
