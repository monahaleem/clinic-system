<?php

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

/**
 * =======================================
 *
 * 			Front Routes
 *
 * =======================================
 */
Route::group(['namespace' => 'Front', 'middleware' => 'auth'], function() {

	/**
	 * Home Routes
	 */
	Route::get('/home', 'HomeController@index')->name('home');
  // Route::get('events', 'HomeController@events');
});



/**
 * =======================================
 *
 * 			Admin Routes
 *
 * =======================================
 */
Route::group(['namespace' => 'Admin', 'prefix' => 'admin'], function() {

	/**
	 * Login Routes
	 */
	Route::get('login', 'Auth\LoginController@showLoginForm')->name('admin.login');
	Route::post('login', 'Auth\LoginController@login');
	Route::post('logout', 'Auth\LoginController@logout')->name('admin.logout');

	/**
	 * Routes that need authentiaction with guard admin
	 */
	Route::group(['middleware' => 'auth:admin'], function () {

		/**
		 * Home Routes
		 */
		Route::get('/', 'HomeController@index')->name('admin.home');
		Route::get('/home', 'HomeController@index');

		/**
		 * Manage Users And Admins Routes
		 */
		Route::resource('admins', 'Users\AdminsController');
		Route::resource('users', 'Users\UsersController');

		/**
		 * Roles & Permissions Routes
		 */
		Route::resource('roles', 'Roles\RolesController');
		Route::resource('permissions', 'Roles\PermissionsController');
	});
});
