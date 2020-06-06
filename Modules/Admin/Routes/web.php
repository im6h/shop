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
Route::group(['prefix' =>'authenticate'],function(){
  Route::get('/login','AdminAuthCotrollerController@getLogin')->name('admin.login');
   Route::post('/login','AdminAuthCotrollerController@postLogin');
   Route::get('/logout','AdminAuthCotrollerController@logoutAdmin')->name('admin.logout');
   Route::get('/','AdminAuthCotrollerController@index')->name('admin.get.list.authenticate');
   Route::get('/create','AdminAuthCotrollerController@create')->name('admin.get.create.authenticate');
   Route::post('/create','AdminAuthCotrollerController@store');
   Route::get('/update/{id}','AdminAuthCotrollerController@edit')->name('admin.get.edit.authenticate');
   Route::post('/update/{id}','AdminAuthCotrollerController@update');
   Route::get('/password','AdminAuthCotrollerController@updatePasswordAdmin')->name('admin.get.update.password.authenticate');
   Route::post('password','AdminAuthCotrollerController@savePasswordAdmin');
   Route::get('{action}/{id}','AdminAuthCotrollerController@action')->name('admin.get.action.authenticate');
});

Route::prefix('admin')->middleware('CheckLoginAdmin')->group(function() {
    Route::get('/', 'AdminController@index')->name('admin.home');


    Route::group(['prefix' => 'category'],function(){
    	Route::get('/','AdminCategoryController@index')->name('admin.get.list.category');
    	Route::get('/create','AdminCategoryController@create')->name('admin.get.create.category');
    	Route::post('/create','AdminCategoryController@store');
    	Route::get('/update/{id}','AdminCategoryController@edit')->name('admin.get.edit.category');
    	Route::post('/update/{id}','AdminCategoryController@update');
    	Route::get('/{action}/{id}','AdminCategoryController@action')->name('admin.get.action.category');
    });
     Route::group(['prefix' => 'product'],function(){
    	Route::get('/','AdminProductController@index')->name('admin.get.list.product');
    	Route::get('/create','AdminProductController@create')->name('admin.get.create.product');
    	Route::post('/create','AdminProductController@store');
    	Route::get('/update/{id}','AdminProductController@edit')->name('admin.get.edit.product');
    	Route::post('/update/{id}','AdminProductController@update');
    	Route::get('/{action}/{id}','AdminProductController@action')->name('admin.get.action.product');
    });
     Route::group(['prefix' => 'article'],function(){
        Route::get('/','AdminArticleController@index')->name('admin.get.list.article');
        Route::get('/create','AdminArticleController@create')->name('admin.get.create.article');
        Route::post('/create','AdminArticleController@store');
        Route::get('/update/{id}','AdminArticleController@edit')->name('admin.get.edit.article');
        Route::post('/update/{id}','AdminArticleController@update');
        Route::get('/{action}/{id}','AdminArticleController@action')->name('admin.get.action.article');
    });
     // Route::get('/{action}/{id}','AdminArticleController@action')->name('admin.get.action.article'); luon luon de cuoi cung
     //quan ly don hang

      Route::group(['prefix' => 'transaction'],function(){
        Route::get('/','AdminTransactionController@index')->name('admin.get.list.transaction');
        Route::get('/view/{id}','AdminTransactionController@viewOrder')->name('admin.get.view.order');
         // Route::get('/delete/{id}','AdminTransactionController@deleteOrder')->name('admin.get.delete.order');
        Route::get('/active/{id}','AdminTransactionController@actionTransaction')->name('admin.get.active.transaction');
         Route::get('/{action}/{id}','AdminTransactionController@action')->name('admin.action.transaction');
    });

        //quan ly nha cung cap

      Route::group(['prefix' => 'supplier'],function(){
        Route::get('/','AdminSupplerController@index')->name('admin.get.list.supplier');
        Route::get('/create','AdminSupplerController@create')->name('admin.get.create.supplier');
        Route::post('/create','AdminSupplerController@store');
        Route::get('/update/{id}','AdminSupplerController@edit')->name('admin.get.edit.supplier');
        Route::post('/update/{id}','AdminSupplerController@update');
        Route::get('/{action}/{id}','AdminSupplerController@action')->name('admin.action.supplier');
        
    });
      //quan ly thanh vien
       Route::group(['prefix' => 'user'],function(){
        Route::get('/','AdminUserController@index')->name('admin.get.list.user');
         Route::get('/{action}/{id}','AdminUserController@action')->name('admin.action.user');
    });

       //quan ly danh gia
       Route::group(['prefix' => 'rating'],function(){
        Route::get('/','AdminRatingController@index')->name('admin.get.list.rating');
        Route::get('/{action}/{id}','AdminRatingController@action')->name('admin.action.rating');
    });

    //quan ly lien he
        Route::group(['prefix' => 'contact'],function(){
        Route::get('/','AdminContactController@index')->name('admin.get.list.contact');
        Route::get('/{action}/{id}','AdminContactController@action')->name('admin.action.contact');
    });
    //page tĩnh
       Route::group(['prefix' => 'page_static'],function(){
        Route::get('/','AdminPageStaticController@index')->name('admin.get.list.page_static');
        Route::get('/create','AdminPageStaticController@create')->name('admin.get.create.page_static');
        Route::post('/create','AdminPageStaticController@store');
        Route::get('/update/{id}','AdminPageStaticController@edit')->name('admin.get.edit.page_static');
        Route::post('/update/{id}','AdminPageStaticController@update');
    }); 
       //kho hang
      Route::group(['prefix' => 'warehouse'],function(){
          Route::get('/','AdminWarehouseController@getWarehouseProduct')->name('admin.get.warehouse.list');
      });
});

