<?php

use App\Http\Controllers\PostController;
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
Auth::routes([
    'register' => false
]); 

Route::get('/blog', 'BlogController@index')->name('blogindex');
Route::get('/about', 'BlogController@about')->name('about');
Route::get('/kontak', 'BlogController@kontak')->name('kontak');
Route::get('/profile', 'BlogController@profile')->name('profile');
Route::get('/blog-kategori', 'BlogController@blogkategori')->name('blogkategori');
Route::get('/blog-post/{slug}', 'BlogController@blogpost')->name('blogpost');
Route::get('/blogkategori/{kategori}', 'BlogController@kategori')->name('kategori');


Route::group(['middleware' => 'auth'], function () {
    
Route::get('/home', 'HomeController@index')->name('home');
//Post
//soft deletes
Route::get('post/showdelete', 'PostController@showdeletes')->name('showdelete');
//Restore
Route::get('post/restore/{id}', 'PostController@restore')->name('restore');
//permanent delete
Route::delete('post/kill/{id}', 'PostController@kill')->name('forcedelete');

Route::get('blog/user/{id}/editpw', 'UserController@editpw')->name('editpw');
Route::put('blog/user/{id}/editpw','UserController@gantipw')->name('gantipw');
//Route resource

Route::resource('blog/post', 'PostController');
Route::group(['middleware' => ['auth', 'admin']], function() {
    // your routes
    Route:: resource('blog/user', 'UserController');
    Route:: resource('blog/kategori', 'KategoriController');
    Route:: resource('blog/tag', 'TagController');
});


});