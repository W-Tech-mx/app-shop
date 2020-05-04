<?php
Route::get('/','TestController@welcome');
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/products/{id}','ProductController@show');
Route::post('/cart/','CartDetailController@store');
Route::delete('/cart/','CartDetailController@destroy');

Route::post('/order/','CartController@update');

Route::middleware(['auth', 'admin'])->prefix('admin')->namespace('Admin')->group(function () {
	Route::get('/products','ProductController@index');//listado
	Route::get('/products/create','ProductController@create');//form
	Route::post('/products','ProductController@store');//registrar
	Route::get('/products/{id}/edit','ProductController@edit');//editar form
	Route::post('/products/{id}/edit','ProductController@update');//eupdate
	Route::delete('/products/{id}','ProductController@destroy');//eliminar form

	Route::get('/products/{id}/images','ImageController@index');//listado
	Route::post('/products/{id}/images','ImageController@store');//registrar
	Route::delete('/products/{id}/images','ImageController@destroy');//form delete

	Route::get('/products/{id}/images/select/{image}','ImageController@select');//destacar img
});
