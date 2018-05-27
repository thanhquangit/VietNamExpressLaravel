<?php

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
Route::get('/','HomeController@Index');
Route::get('type/{id}','HomeController@getNewsByType');
Route::get('detail/{id}','HomeController@getDetailNews');
Route::post('search','HomeController@postSearch');
Route::get('admin', function(){
	return view('admin.role.add');
});

Route::group(['prefix'=>'admin'], function(){
	Route::group(['prefix'=>'category'], function(){
		Route::get('list','Admin\CategoryController@getListCategory');
		Route::get('add','Admin\CategoryController@getAddCategory');
		Route::post('add','Admin\CategoryController@postAddCategory');
		Route::get('edit/{id}','Admin\CategoryController@getEditCategory');
		Route::post('edit/{id}', 'Admin\CategoryController@postEditCategory');
		Route::get('delete/{id}','Admin\CategoryController@getDeleteCategory');
	});
	Route::group(['prefix'=>'type'], function(){
		Route::get('list','Admin\TypeController@getListType');
		Route::get('add','Admin\TypeController@getAddType');
		Route::post('add','Admin\TypeController@postAddType');
		Route::get('edit/{id}','Admin\TypeController@getEditType');
		Route::post('edit/{id}', 'Admin\TypeController@postEditType');
		Route::get('delete/{id}','Admin\TypeController@getDeleteType');
	});
	Route::group(['prefix'=>'vote'], function(){
		Route::get('list','Admin\VoteController@getListVote');
		Route::get('add','Admin\VoteController@getAddVote');
		Route::post('add','Admin\VoteController@postAddVote');
		Route::get('edit/{id}','Admin\VoteController@getEditVote');
		Route::post('edit/{id}', 'Admin\VoteController@postEditVote');
		Route::get('delete/{id}','Admin\VoteController@getDeleteVote');
	});
	Route::group(['prefix'=>'plans'], function(){
		Route::get('list/{id}','Admin\PlansController@getListPlans');
		Route::get('add/{id}','Admin\PlansController@getAddPlans');
		Route::post('add/{id}','Admin\PlansController@postAddPlans');
		Route::get('edit/{id}','Admin\PlansController@getEditPlans');
		Route::post('edit/{id}', 'Admin\PlansController@postEditPlans');
		Route::get('delete/{id}/{idV}','Admin\PlansController@getDeletePlans');
	});
	Route::group(['prefix'=>'contact'], function(){
		Route::get('list','Admin\ContactController@getListContact');
		Route::get('add','Admin\ContactController@getAddContact');
		Route::post('add','Admin\ContactController@postAddContact');
		Route::get('edit/{id}','Admin\ContactController@getEditContact');
		Route::post('edit/{id}', 'Admin\ContactController@postEditContact');
		Route::get('delete/{id}','Admin\ContactController@getDeleteContact');
	});
	Route::group(['prefix'=>'event'], function(){
		Route::get('list','Admin\EventController@getListEvent');
		Route::get('add','Admin\EventController@getAddEvent');
		Route::post('add','Admin\EventController@postAddEvent');
		Route::get('edit/{id}','Admin\EventController@getEditEvent');
		Route::post('edit/{id}', 'Admin\EventController@postEditEvent');
		Route::get('delete/{id}','Admin\EventController@getDeleteEvent');
	});
	Route::group(['prefix'=>'links'], function(){
		Route::get('list','Admin\LinksController@getListLinks');
		Route::get('add','Admin\LinksController@getAddLinks');
		Route::post('add','Admin\LinksController@postAddLinks');
		Route::get('edit/{id}','Admin\LinksController@getEditLinks');
		Route::post('edit/{id}', 'Admin\LinksController@postEditLinks');
		Route::get('delete/{id}','Admin\LinksController@getDeleteLinks');
	});
	Route::group(['prefix'=>'advertisement'], function(){
		Route::get('list','Admin\AdvertisementController@getListAdvertisement');
		Route::get('add','Admin\AdvertisementController@getAddAdvertisement');
		Route::post('add','Admin\AdvertisementController@postAddAdvertisement');
		Route::get('edit/{id}','Admin\AdvertisementController@getEditAdvertisement');
		Route::post('edit/{id}', 'Admin\AdvertisementController@postEditAdvertisement');
		Route::get('delete/{id}','Admin\AdvertisementController@getDeleteAdvertisement');
	});
});