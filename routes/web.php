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


// Frontend Area----------->

Route::get('/','frontend\FrontendController@home');
Route::get('Item/{id}/{item_name}','frontend\FrontendController@Item');
Route::get('categories/{id}/{category_name}','frontend\FrontendController@categories');
Route::get('newsdetails/{id}/{news_title}','frontend\FrontendController@newsdetails');
Route::get('searchnews','frontend\FrontendController@searchnews');



// Backend Start -------->

Route::get('/backend', function () {
    return view('backend.home');
});

// Admin Start -------->

Route::get('Create-Admin', 'Backend\UserController@createadmin');
Route::post('usercreate', 'Backend\UserController@usercreate');
Route::get('Manage-Admin', 'Backend\UserController@manageadmin');
Route::get('inactiveuser/{id}', 'Backend\UserController@inactiveuser');
Route::get('activeuser/{id}', 'Backend\UserController@activeuser');
Route::get('deleteuser/{id}', 'Backend\UserController@deleteuser');
Route::get('edituser/{id}', 'Backend\UserController@edituser');
Route::post('userupdate/{id}', 'Backend\UserController@userupdate');

// Item Start -------->

Route::get('Item', 'Backend\ItemController@item');
Route::post('iteminsert', 'Backend\ItemController@iteminsert');
Route::get('Manage-Item', 'Backend\ItemController@manageitem');
Route::get('inactiveitem/{id}', 'Backend\ItemController@inactiveitem');
Route::get('activeitem/{id}', 'Backend\ItemController@activeitem');
Route::get('deleteitem/{id}', 'Backend\ItemController@deleteitem');
Route::get('edititem/{id}', 'Backend\ItemController@edititem');
Route::post('itemupdate/{id}', 'Backend\ItemController@itemupdate');


// Category Start -------->

Route::get('Category', 'Backend\CategoryController@category');
Route::post('categoryinsert', 'Backend\CategoryController@categoryinsert');
Route::get('Manage-Category', 'Backend\CategoryController@managecategory');
Route::get('inactivecategory/{id}', 'Backend\CategoryController@inactivecategory');
Route::get('activecategory/{id}', 'Backend\CategoryController@activecategory');
Route::get('deletecategory/{id}', 'Backend\CategoryController@deletecategory');
Route::get('editcategory/{id}', 'Backend\CategoryController@editcategory');
Route::post('categoryupdate/{id}', 'Backend\CategoryController@categoryupdate');

// News Start -------->

Route::get('News', 'Backend\NewsController@news');
Route::get('categoryget/{item_id}','Backend\NewsController@categoryget');
Route::get('Manage-News', 'Backend\NewsController@managenews');
Route::post('newsinsert', 'Backend\NewsController@newsinsert');
Route::get('inactivenews/{id}', 'Backend\NewsController@inactivenews');
Route::get('activenews/{id}', 'Backend\NewsController@activenews');
Route::get('deletenews/{id}', 'Backend\NewsController@deletenews');
Route::get('editnews/{id}', 'Backend\NewsController@editnews');
Route::post('newsupdate/{id}', 'Backend\NewsController@newsupdate');

// Website Settings Start -------->

Route::get('Settings', 'Backend\WebsiteSettingsController@settings');
Route::post('updatesettings/{id}', 'Backend\WebsiteSettingsController@updatesettings');
Route::get('Contact', 'Backend\WebsiteSettingsController@contact');
Route::post('contactupdate/{id}', 'Backend\WebsiteSettingsController@contactupdate');