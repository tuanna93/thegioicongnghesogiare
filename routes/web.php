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

Route::get('/', 'HomeController@home');
Route::get('/trang-chu.html', 'HomeController@home');
Route::get('/dang-ky.html','HomeController@register');
Route::get('/search.html','HomeController@search');
Route::get('/tin-tuc.html','HomeController@news');
Route::get('/lien-he.html','HomeController@getContact');
Route::post('/lien-he.html','HomeController@postContact');
Route::get('/404.html','HomeController@error_404');
Route::get('/chi-tiet/{slug}.html','HomeController@detailpost');
Route::get('/chuyen-muc/{slug}.html','HomeController@cate');
Route::get('/san-pham/{slug}.html','HomeController@detail');
Route::get('/san-pham.html','HomeController@product');
Route::get('/dat-mua.html/{id?}','HomeController@getcart');
Route::post('/dat-mua.html','HomeController@postcart');
Route::get('/mua-hang/{id}/{qty}','HomeController@updatecart');
Route::get('/huy-hang/{id}','HomeController@deletecart');
Route::get('/thanh-toan.html','HomeController@payment');
Route::post('/thanh-toan.html','HomeController@postpayment');
Route::get('/{slug}.html','HomeController@onepage');
Route::group(['prefix' => 'admin','middleware'=>'auth'], function () {
    Route::get('', 'Admin\\AdminController@admin');
    Route::get('login.html','Auth\\LoginController@showLoginForm');
    Route::post('login.html','Auth\\LoginController@login');
    Route::get('logout.html','Admin\\AdminController@getLogin');
    Route::get('dashboard.html', 'Admin\\AdminController@dashboard');
    Route::group(['prefix' => 'cate'], function () {
        Route::get('add.html','Admin\\CateController@getCateAdd');
        Route::post('add.html','Admin\\CateController@postCateAdd');
        Route::get('list.html','Admin\\CateController@getCateList');
        Route::post('list.html','Admin\\CateController@postCateList');
        Route::get('view/{slug}.html','Admin\\CateController@getView');
        Route::get('edit/{slug}.html','Admin\\CateController@getEdit');
        Route::post('edit/{slug}.html','Admin\\CateController@postEdit');
        Route::get('delete/{slug}.html','Admin\\CateController@getDelete');
    });
    Route::group(['prefix' => 'product'], function () {
        Route::get('add.html','Admin\\ProductController@getAdd');
        Route::post('add.html','Admin\\ProductController@postAdd');
        Route::get('list.html','Admin\\ProductController@getList');
        Route::post('list.html','Admin\\ProductController@postList');
        Route::get('view/{slug}.html','Admin\\ProductController@getView');
        Route::get('edit/{slug}.html','Admin\\ProductController@getEdit');
        Route::post('edit/{slug}.html','Admin\\ProductController@postEdit');
        Route::get('delete/{slug}.html','Admin\\ProductController@getDelete');
    });
    Route::group(['prefix' => 'catepost'], function () {
        Route::get('add.html','Admin\\CatePostsController@getCateAdd');
        Route::post('add.html','Admin\\CatePostsController@postCateAdd');
        Route::get('list.html','Admin\\CatePostsController@getCateList');
        Route::post('list.html','Admin\\CatePostsController@postCateList');
        Route::get('view/{slug}.html','Admin\\CatePostsController@getView');
        Route::get('edit/{slug}.html','Admin\\CatePostsController@getEdit');
        Route::post('edit/{slug}.html','Admin\\CatePostsController@postEdit');
        Route::get('delete/{slug}.html','Admin\\CatePostsController@getDelete');
    });
    Route::group(['prefix' => 'post'], function () {
        Route::get('add.html','Admin\\PostsController@getAdd');
        Route::post('add.html','Admin\\PostsController@postAdd');
        Route::get('list.html','Admin\\PostsController@getList');
        Route::post('list.html','Admin\\PostsController@postList');
        Route::get('view/{slug}.html','Admin\\PostsController@getView');
        Route::get('edit/{slug}.html','Admin\\PostsController@getEdit');
        Route::post('edit/{slug}.html','Admin\\PostsController@postEdit');
        Route::get('delete/{slug}.html','Admin\\PostsController@getDelete');
    });
    Route::group(['prefix' => 'onepage'], function () {
        Route::get('add.html','Admin\\AdminController@getAdd');
        Route::post('add.html','Admin\\AdminController@postAdd');
        Route::get('list.html','Admin\\AdminController@getList');
        Route::post('list.html','Admin\\AdminController@postList');
        Route::get('view/{slug}.html','Admin\\AdminController@getView');
        Route::get('edit/{slug}.html','Admin\\AdminController@getEdit');
        Route::post('edit/{slug}.html','Admin\\AdminController@postEdit');
        Route::get('delete/{slug}.html','Admin\\AdminController@getDelete');
    });
    Route::group(['prefix' => 'order'], function () {
        Route::get('list.html','Admin\\OrderController@getList');
        Route::get('view/{id}','Admin\\OrderController@getView');
        Route::get('accept/{id}','Admin\\OrderController@accept');
        Route::get('delete/{id}','Admin\\OrderController@getDelete');
    });
    Route::group(['prefix' => 'menu'], function () {
        Route::get('list.html','Admin\\MenuController@getList');
        Route::get('add.html','Admin\\MenuController@getAdd');
        Route::post('add.html','Admin\\MenuController@postAdd');
        Route::get('edit/{id}','Admin\\MenuController@getEdit');
        Route::post('edit/{id}','Admin\\MenuController@postEdit');
        Route::get('delete/{id}','Admin\\MenuController@getDelete');
    });
    Route::group(['prefix' => 'adv'], function () {
        Route::get('list.html','Admin\\AdvController@getList');
        Route::post('list.html','Admin\\AdvController@postList');
        Route::get('add.html','Admin\\AdvController@getAdd');
        Route::post('add.html','Admin\\AdvController@postAdd');
        Route::get('edit/{id}','Admin\\AdvController@getEdit');
        Route::post('edit/{id}','Admin\\AdvController@postEdit');
        Route::get('delete/{id}','Admin\\AdvController@getDelete');
    });
    Route::get('options.html','Admin\\AdminController@getOption');
    Route::post('options.html','Admin\\AdminController@postOption');
    Route::get('loadkieutrang-{id}','Admin\\MenuController@loadkieutrang');
    Route::get('logout.html','Auth\\LoginController@logout');
});
Auth::routes();

Route::get('/home', function(){
    return redirect('/admin');
});
Auth::routes();

Route::get('/home', 'HomeController@index');
