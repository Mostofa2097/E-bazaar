<?php

use App\Http\Controllers\Auth\LoginController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;


Route::get('/admin-login', [LoginController::class, 'adminLogin'])->name('admin.login');

// Route::get('/admin/home', [App\Http\Controllers\HomeController::class, 'admin'])->name('admin.home')->
// middleware('is_admin');

Route::group(['namespace'=>'App\Http\Controllers\Admin' , 'middleware'=> 'is_admin'],function(){

    Route::get('/admin/home', 'AdminController@admin')->name('admin.home');
    Route::get('/admin/logout', 'AdminController@logout')->name('admin.logout');

    Route::group(['prefix'=> 'category'], function(){
        Route::get('/','CategoryController@index')->name('category.index');
        Route::post('/store','CategoryController@store')->name('category.store');
        Route::get('/delete/{id}','CategoryController@destroy')->name('category.delete');
        Route::get('/edit/{id}','CategoryController@edit')->name('category.edit');
        Route::post('/update/{id}','CategoryController@update')->name('category.update');
        //Route::get('/edit/{id}','CategoryController@edit');

    });


    Route::group(['prefix'=> 'subcategory'], function(){
        Route::get('/','SubcategoryController@index')->name('subcategory.index');
         Route::post('/store','SubcategoryController@store')->name('subcategory.store');
         Route::get('/delete/{id}','SubcategoryController@destroy')->name('subcategory.delete');
        Route::get('/edit/{id}','SubcategoryController@edit')->name('subcategory.edit');
        Route::post('/update/{id}','SubcategoryController@update')->name('subcategory.update');
        // //Route::get('/edit/{id}','CategoryController@edit');

    });


  

    //childcategory routes
    
	Route::group(['prefix'=>'childcategory'], function(){
		Route::get('/','ChildcategoryController@index')->name('childcategory.index');
		Route::post('/store','ChildcategoryController@store')->name('childcategory.store');
		Route::get('/delete/{id}','ChildcategoryController@destroy')->name('childcategory.delete');
		Route::get('/edit/{id}','ChildcategoryController@edit');
		Route::post('/update','ChildcategoryController@update')->name('childcategory.update');
	});

});