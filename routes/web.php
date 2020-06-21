<?php
use App\Http\Middleware\CheckLoginUser;

Auth::routes();

Route::group(['namespace' => 'Auth'],function(){
	//register
	Route::get('dang-ky','RegisterController@getRegister')->name('get.register');
	Route::post('dang-ky','RegisterController@postRegister')->name('post.register');
	//login
	Route::get('dang-nhap','LoginController@getLogin')->name('get.login');
	Route::post('dang-nhap','LoginController@postLogin')->name('post.login');
	//logout
	Route::get('dang-xuat','LoginController@postLogout')->name('get.logout.user');
	//reset password
	Route::get('/lay-lai-mat-khau','ForgotPasswordController@getFormResetPassword')->name('get.reset.password');
	Route::post('/lay-lai-mat-khau','ForgotPasswordController@sendCodeResetPassword');
	Route::get('/password/reset','ForgotPasswordController@resetPassword')->name('get.link.reset.password');
	Route::get('/password/reset','ForgotPasswordController@resetPassword')->name('get.link.reset.password');
	Route::post('/password/reset','ForgotPasswordController@saveResetPassword');
});
Route::get('/', 'HomeController@index')->name('home');
Route::get('danh-muc/{slug}-{id}','CategoryController@getListProduct')->name('get.list.product');
Route::get('san-pham','CategoryController@getListProduct')->name('get.product.list');
Route::get('san-pham/{slug}-{id}','ProductDetailController@productDetail')->name('get.detail.product');

// article

Route::get('bai-viet','ArticleController@getListArticle')->name('get.list.article');
Route::get('bai-viet/{slug}-{id}','ArticleController@getDetailArticle')->name('get.detail.article');


// cart
Route::prefix('shopping')->group(function(){
	Route::get('/add/{id}','ShoppingCartController@addProduct')->name('add.shopping.cart');
	Route::get('/danh-sach','ShoppingCartController@getListShoppingCart')->name('get.list.shopping.cart');
	Route::get('/{id}/{idrow}/{qty}/{dk}','ShoppingCartController@getupdatecart')->name('get.quantity.cart');
	Route::get('/delete/{id}','ShoppingCartController@deleteProductItem')->name('delete.shopping.cart');
});
 //payment
Route::group(['prefix' => 'gio-hang', 'middleware' => 'CheckLoginUser'], function(){
	Route::get('/thanh-toan','ShoppingCartController@getFormPay')->name('get.form.pay');
	Route::post('/thanh-toan','ShoppingCartController@saveInfoShoppingCart');
});

//rating
Route::group(['prefix' => 'ajax', 'middleware' => 'CheckLoginUser'], function(){
	Route::post('/danh-gia/{id}','RatingController@saveRating')->name('post.rating.product');
});

Route::group(['prefix' => 'ajax'], function(){
	Route::post('/view-product','HomeController@renderProductView')->name('post.product.view');
});

// contact customer
Route::get('lien-he','ContactController@getContact')->name('get.contact');
Route::post('lien-he','ContactController@saveContact');

//

Route::get('ve-chung-toi','PageStaticController@aboutUs')->name('get.about_us');
Route::get('thong-tin-giao-hang','PageStaticController@infoShopping')->name('get.info_shopping');
Route::get('chinh-sach-bao-mat','PageStaticController@security')->name('get.security');
Route::get('dieu-khoan-su-dung','PageStaticController@rules')->name('get.rules');

//user
Route::group(['prefix' => 'user', 'middleware' => 'CheckLoginUser'], function(){
	Route::get('/','UserController@index')->name('user.dashboard');
	Route::get('/info','UserController@updateInfo')->name('user.update.info');
	Route::post('/info','UserController@saveUpdateInfo');
	Route::get('/password','UserController@updatePassword')->name('user.update.password');
	Route::post('/password','UserController@saveUpdatePassword');
	Route::get('/san-pham-ban-chay','UserController@getListProduct')->name('user.list.product');
	Route::get('/san-pham-quan-tam','UserController@getProductCare')->name('user.care.product');
});