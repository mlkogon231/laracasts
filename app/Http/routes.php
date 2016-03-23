<?php


Route::get('about', 'PagesController@about');
Route::get('contact', 'PagesController@contact');
Route::resource('articles', 'ArticlesController');

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);



//Route::get('foo', ['middleware' => 'manager', function()
//{
//	return 'this page may only be viewed by a manager';
//}]);


//Route::get('articles', 'ArticlesController@index');
//Route::get('articles/create', 'ArticlesController@create');
//Route::get('articles/{id}', 'ArticlesController@show');
//Route::post('articles', 'ArticlesController@store');
//Route::get('articles/{id}/edit', 'ArticlesController@edit');




