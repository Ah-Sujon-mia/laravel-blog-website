<?php

use Illuminate\Support\Facades\Auth;
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

Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');

// Frontend Route
Route::get('/', 'Frontend\FrontendController@index')->name('front.end');
Route::get('/about', 'Frontend\FrontendController@about')->name('about');
Route::get('/contact', 'Frontend\FrontendController@contact')->name('contact');
Route::get('/category', 'Frontend\FrontendController@category')->name('category');
Route::get('/post/{slug}', 'Frontend\FrontendController@post')->name('single.post');
Route::get('category/post/{id}', 'Frontend\FrontendController@categoryPost')->name('category.post');
Route::post('contact-form', 'Frontend\FrontendController@contatStore')->name('contact.form');

 
// Admin Route
Route::group(['prefix' => 'admin', 'middleware' => ['auth','admin']], function()
{
    Route::get('dashboard', 'DashboardController@index')->name('admin.dashboard');
	Route::resource('category', 'CategoryController');
    Route::resource('tags', 'TagController');
    Route::resource('posts', 'PostController');
    Route::resource('user', 'UserController');
    Route::get('profile', 'ProfileController@profile')->name('profile');
    Route::post('profile/store', 'ProfileController@profileStore')->name('update.profile');
    Route::get('password', 'ProfileController@password')->name('passwords');
    Route::post('password/change', 'ProfileController@changePassword')->name('update.password');
    Route::get('contact/list', 'ContactController@contact')->name('contact.us');
    Route::get('contact/delete/{id}', 'ContactController@contactDelete')->name('contact.delete');
    Route::get('contact/show/{id}', 'ContactController@contactshow')->name('contact.show');
    Route::get('setting', 'SettingController@setting')->name('setting.index');
    Route::post('setting/store/{id}', 'SettingController@store')->name('setting.store');

});

// User Route 
Route::group(['prefix' => 'User', 'middleware' => ['auth','user']], function()
{
    Route::get('author/dashboard', 'DashboardController@author')->name('author.dashboard');

});