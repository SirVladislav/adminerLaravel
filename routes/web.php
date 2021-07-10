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
    return view('login');
});

Route::get('/login', function () {
    return view('login');
});

Route::get('/register', function () {
    return view('register');
});

Route::get('/create-note', function(){
    return view('create-note');
});

Route::get('/adminpanel', 'App\Http\Controllers\UserController@adminpanelLoad')->middleware('UserIsAdmin')->name('adminpanel');

Route::get('/adminpanel/loadNote/{id}', 'App\Http\Controllers\NoteController@adminpanelLoadNotes')->middleware('UserIsAdmin');

Route::get('/edit-note/{id}', 'App\Http\Controllers\NoteController@loadNote');

Route::get('/main',  'App\Http\Controllers\NoteController@upload')->middleware('UserIsAuth');


//post
Route::post('/register', 'App\Http\Controllers\UserController@register');

Route::post('/login', 'App\Http\Controllers\UserController@login');

Route::post('/logout', 'App\Http\Controllers\UserController@logout')->name('logout');

Route::post('/save-note', 'App\Http\Controllers\NoteController@save');

Route::post('/edit-note/{id}', 'App\Http\Controllers\NoteController@editNote');

Route::post('/delete-note/{id}', 'App\Http\Controllers\NoteController@delete');

Route::post('/delete-user/{id}', 'App\Http\Controllers\UserController@deleteUser');
