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

Route::get('/', 'WelcomeController@index')->name('welcome');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['prefix'=>'kategory'], function(){
    route::get('/','kategoriController@index')->name('kategory');
    route::get('/create','kategoriController@create')->name('kategory.create');
    route::post('/store','kategoriController@store')->name('kategory.store');
    route::get('/edit/{kategori}','kategoriController@edit')->name('kategory.edit');
    route::patch('/update/{kategori}','kategoriController@update')->name('kategory.update');
    route::delete('/destroy/{kategori}','kategoriController@destroy')->name('kategory.destroy');
});

Route::group(['prefix' => 'produck'], function(){
    route::get('/', 'ProduckController@index')->name('produck');
    route::get('/create', 'ProduckController@create')->name('produck.create');
    route::post('/store', 'ProduckController@store')->name('produck.store');
    route::get('/edit/{produk}', 'ProduckController@edit')->name('produck.edit');
    route::patch('/update/{produk}', 'ProduckController@update')->name('produck.update');
    route::get('/show/{produk}', 'ProduckController@show')->name('produck.show');
});

Route::group(['prefix'=> 'user'], function(){
    route::post('add-cart', 'CartController@addToCart')->name('user.add-cart');
    route::get('cek/cart', 'CartController@listCart')->name('user.cek.cart');
    route::get('checkout/cart', 'CartController@checkout')->name('user.checkout.cart');
    route::post('/proses/checkout', 'CartController@prosesCheckout')->name('user.proses.checkout');
    route::get('/checkout/selesai/{invoice}', 'CartController@checkoutSelesai')->name('user.checkout.selesai');

    route::get('ambil-form/{pembelian}','PembayaranController@create')->name('user.ambil-form');
    route::post('upload-payment/{pembelian}','PembayaranController@store')->name('user.upload-payment');

    route::get('transaksi','User\TransaksiController@index')->name('user.transaksi');
    route::post('destroy/transaksi/{pembelian}','User\TransaksiController@destroy')->name('user.destroy.transaksi');
});

Route::group(['prefix' => 'petugas'], function(){
    route::get('/','UserController@index')->name('petugas');
    route::get('/create','UserController@create')->name('petugas.create');
    route::post('/store','UserController@store')->name('petugas.store');
    route::get('/edit/{user}','UserController@edit')->name('petugas.edit');
    route::patch('/update/{user}','UserController@update')->name('petugas.update');
    route::delete('/destroy/{user}','UserController@destroy')->name('petugas.destroy');

    route::get('customer','CustomerController@index')->name('petugas.customer');

    route::get('pembelian', 'Admin\TransaksiController@index')->name('petugas.pembelian');
    route::get('transaksi/berlangsung', 'Admin\TransaksiController@berlangsung')->name('petugas.pembelian.berlangsung');
    route::get('transaksi/selesai', 'Admin\TransaksiController@selesai')->name('petugas.pembelian.selesai');
    route::patch('transaksi/update/{pembelian}', 'Admin\TransaksiController@update')->name('petugas.pembelian.update');
});

Route::group(['prefix'=>'cetak'], function(){
    route::get('invoice/{pembelian}','Laporan\Transaksi\TransaksiController@show')->name('cetak.invoice');
});
