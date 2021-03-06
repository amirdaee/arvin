<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return redirect('login');
});


    // Authentication Routes...
    Route::get('login', [
        'as' => 'login',
        'uses' => 'Auth\LoginController@showLoginForm'
    ]);
    Route::post('login', [
        'as' => '',
        'uses' => 'Auth\LoginController@login'
    ]);
    Route::post('logout', [
        'as' => 'logout',
        'uses' => 'Auth\LoginController@logout'
    ]);

// Password Reset Routes...
//    Route::post('password/email', [
//        'as' => 'password.email',
//        'uses' => 'Auth\ForgotPasswordController@sendResetLinkEmail'
//    ]);
//    Route::get('password/reset', [
//        'as' => 'password.request',
//        'uses' => 'Auth\ForgotPasswordController@showLinkRequestForm'
//    ]);
//    Route::post('password/reset', [
//        'as' => 'password.update',
//        'uses' => 'Auth\ResetPasswordController@reset'
//    ]);
//    Route::get('password/reset/{token}', [
//        'as' => 'password.reset',
//        'uses' => 'Auth\ResetPasswordController@showResetForm'
//    ]);

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware' => ['auth']], function() {
    Route::get('/panel',
        ['uses'=>'PanelController@index']
    )->name('panel');
    Route::group(['prefix' => '/users'], function() {
        Route::get('/',
            ['as'=>'users.index',
                'uses'=>'UsersController@index',
                'middleware' => ['permission:read-users|create-users|update-users|delete-users']
            ]);
        Route::get('/create',
            ['as'=>'users.create',
                'uses'=>'UsersController@create',
                'middleware' => ['permission:create-users']
            ]);
        Route::post('/create',
            ['as'=>'users.store',
                'uses'=>'UsersController@store',
                'middleware' => ['permission:create-users']
            ]);
        Route::get('/{id}',
            ['as'=>'users.show',
                'uses'=>'UsersController@show',
                'middleware' => ['permission:read-users']
            ]);
        Route::get('/{id}/edit',
            ['as'=>'users.edit',
                'uses'=>'UsersController@edit',
                'middleware' => ['permission:update-users']
            ]);
        Route::patch('/{id}',
            ['as'=>'users.update',
                'uses'=>'UsersController@update',
                'middleware' => ['permission:update-users']
            ]);
        Route::delete('/{id}',
            ['as'=>'users.destroy',
                'uses'=>'UsersController@destroy',
                'middleware' => ['permission:delete-users']
            ]);
    });
    Route::group(['prefix' => '/roles'], function() {
        Route::get('/',
            ['as'=>'roles.index',
                'uses'=>'RolesController@index',
                'middleware' => ['permission:read-roles|create-roles|update-roles|delete-roles']
            ]);
        Route::get('/create',
            ['as'=>'roles.create',
                'uses'=>'RolesController@create',
                'middleware' => ['permission:create-roles']
            ]);
        Route::post('/create',
            ['as'=>'roles.store',
                'uses'=>'RolesController@store',
                'middleware' => ['permission:create-roles']
            ]);
        Route::get('/{id}',
            ['as'=>'roles.show',
                'uses'=>'RolesController@show'
            ]);
        Route::get('/{id}/edit',
            ['as'=>'roles.edit',
                'uses'=>'RolesController@edit',
                'middleware' => ['permission:update-roles']
            ]);
        Route::patch('/{id}',
            ['as'=>'roles.update',
                'uses'=>'RolesController@update',
                'middleware' => ['permission:delete-roles']
            ]);
        Route::delete('/{id}',
            ['as'=>'roles.destroy',
                'uses'=>'RolesController@destroy',
                'middleware' => ['permission:delete-roles']
            ]);
    });
    Route::group(['prefix' => '/departments'], function(){
        Route::get('/',
            ['as'=>'departments.index',
                'uses'=>'DepartmentsController@index',
                'middleware' => ['permission:read-departments|create-departments|update-departments|delete-departments']
            ]);
        Route::get('/create',
            ['as'=>'departments.create',
                'uses'=>'DepartmentsController@create',
                'middleware' => ['permission:create-departments']
            ]);
        Route::post('/create',
            ['as'=>'departments.store',
                'uses'=>'DepartmentsController@store',
                'middleware' => ['permission:create-departments']
            ]);
        Route::get('/{id}',
            ['as'=>'departments.show',
                'uses'=>'DepartmentsController@show',
                'middleware' => ['permission:read-departments']
            ])->where('id', '[0-9]+');
        Route::get('/{id}/edit',
            ['as'=>'departments.edit',
                'uses'=>'DepartmentsController@edit',
                'middleware' => ['permission:update-departments']
            ])->where('id', '[0-9]+');
        Route::patch('/{id}',
            ['as'=>'departments.update',
                'uses'=>'DepartmentsController@update',
                'middleware' => ['permission:update-departments']
            ])->where('id', '[0-9]+');
        Route::delete('/{id}',
            ['as'=>'departments.destroy',
                'uses'=>'DepartmentsController@destroy',
                'middleware' => ['permission:delete-departments']
            ])->where('id', '[0-9]+');
    });
    Route::group(['prefix' => '/projects'], function(){
        Route::get('/',
            ['as'=>'projects.index',
                'uses'=>'ProjectsController@index',
                'middleware' => ['permission:read-projects|create-projects|update-projects|delete-projects']
            ]);
        Route::get('/create',
            ['as'=>'projects.create',
                'uses'=>'ProjectsController@create',
                'middleware' => ['permission:create-projects']
            ]);
        Route::post('/create',
            ['as'=>'projects.store',
                'uses'=>'ProjectsController@store',
                'middleware' => ['permission:create-projects']
            ]);
        Route::get('/{id}',
            ['as'=>'projects.show',
                'uses'=>'ProjectsController@show',
                'middleware' => ['permission:read-projects']
            ])->where('id', '[0-9]+');
        Route::get('/{id}/edit',
            ['as'=>'projects.edit',
                'uses'=>'ProjectsController@edit',
                'middleware' => ['permission:update-projects']
            ])->where('id', '[0-9]+');
        Route::patch('/{id}',
            ['as'=>'projects.update',
                'uses'=>'ProjectsController@update',
                'middleware' => ['permission:update-projects']
            ])->where('id', '[0-9]+');
        Route::delete('/{id}',
            ['as'=>'projects.destroy',
                'uses'=>'ProjectsController@destroy',
                'middleware' => ['permission:delete-projects']
            ])->where('id', '[0-9]+');
    });
});
