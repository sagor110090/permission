<?php

Route::group(['middleware' => ['web', 'auth','isAdmin']], function(){
    
	Route::resource('admin/role', 'Sagor110090\Permission\RoleController');
	Route::resource('admin/user', 'Sagor110090\Permission\UserController');

});
