<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers;
use App\Http\Controllers\indexController;
use App\Http\Controllers\productController;
use App\Http\Controllers\userController;
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
$admin='admin';
$page='page';
$user='user';


Route::group(['prefix' => $admin,'namespace'=>'admin'], function() {
        Route::get('/index','indexController@index')->name('admin.index');
        Route::get('/users','indexController@users')->name('admin.user');
        Route::get('/tables','indexController@table')->name('admin.table');
        Route::get('/information','indexController@information')->name('admin.information');
    Route::group(['prefix' => 'admin/product'], function() {
        Route::post('/add/product','productController@addproduct')->name('addproduct');
        Route::get('/news','productController@news')->name('news');
        Route::get('/deteles','productController@deletes')->name('deletes');
    });
        
});

//

Route::group(['prefix' => $page,'namespace'=>'page'], function() {
    Route::group(['prefix' => '/user'], function() {
        Route::get('/logout','userController@logout')->name('logout');
        Route::post('/postlogin','userController@postlogin')->name('postlogin');
        Route::post('/postregister','userController@postregister')->name('postregister');
        Route::get('/login','indexController@login')->name('dangnhap');
        Route::get('/logup','indexController@logup')->name('dangky');
        Route::get('/my-account', 'indexController@account')->name('my-account')->middleware('loggin');
    });

    Route::group(['prefix' => '/products'], function() {
         Route::post('/buy','productController@buy')->name('buy')->middleware('loggin');
         Route::get('/cart/update','productController@updatecart')->name('updatecart'); 
         Route::get('cart/detele','productController@destroy')->name('delete');
        Route::get('/addcart','productController@addcart')->name('addcart');
        
    });
        Route::get('/sendmail','productController@send');
        Route::get('/seach','indexController@seach')->name('seach');      
        Route::post('/orders','productController@orders')->name('orders');
        Route::get('/remove','productController@remove')->name('remove');
        Route::get('/comments','productController@comments')->name('comments');
        Route::get('checkouts','indexController@checkouts')->name('checkout')->middleware('loggin');
       Route::get('city','productController@city')->name('city');
        Route::get('/shoppingcarts','indexController@shoppingcarts')->name('shoppingcart');
       
        Route::get('chitiet/{id}', 'productController@chitiet')->name('chitiet');
        
        Route::get('products/the-loai/{type}','indexController@category')->name('products');

        Route::get('/about','indexController@introduce')->name('gioithieu');
        Route::get('contacts','indexController@contacts')->name('lienhe');
        Route::get('/','indexController@index')->name('index');
});
