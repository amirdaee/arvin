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
});
Route::group(['middleware' => ['auth']], function() {
    Route::get('/panel',
        ['uses'=>'PanelController@index']
    )->name('panel');
    Route::group(['prefix' => '/users'], function() {
        Route::get('/',
            ['as'=>'users.index',
                'uses'=>'UsersController@index',
                'middleware' => ['permission:list-user|create-user|edit-user|delete-user']
            ]);
        Route::get('/create',
            ['as'=>'users.create',
                'uses'=>'UsersController@create',
                'middleware' => ['permission:create-user']
            ]);
        Route::post('/create',
            ['as'=>'users.store',
                'uses'=>'UsersController@store',
                'middleware' => ['permission:create-user']
            ]);
        Route::get('/{id}',
            ['as'=>'users.show',
                'uses'=>'UsersController@show',
                'middleware' => ['permission:list-user']
            ]);
        Route::get('/{id}/edit',
            ['as'=>'users.edit',
                'uses'=>'UsersController@edit',
                'middleware' => ['permission:edit-user']
            ]);
        Route::patch('/{id}',
            ['as'=>'users.update',
                'uses'=>'UsersController@update',
                'middleware' => ['permission:edit-user']
            ]);
        Route::delete('/{id}',
            ['as'=>'users.destroy',
                'uses'=>'UsersController@destroy',
                'middleware' => ['permission:delete-user']
            ]);
    });
    Route::group(['prefix' => '/roles'], function() {
        Route::get('/',
            ['as'=>'roles.index',
                'uses'=>'RolesController@index',
                'middleware' => ['permission:list-role|create-role|edit-role|delete-role']
            ]);
        Route::get('/create',
            ['as'=>'roles.create',
                'uses'=>'RolesController@create',
                'middleware' => ['permission:create-role']
            ]);
        Route::post('/create',
            ['as'=>'roles.store',
                'uses'=>'RolesController@store',
                'middleware' => ['permission:create-role']
            ]);
        Route::get('/{id}',
            ['as'=>'roles.show',
                'uses'=>'RolesController@show'
            ]);
        Route::get('/{id}/edit',
            ['as'=>'roles.edit',
                'uses'=>'RolesController@edit',
                'middleware' => ['permission:edit-role']
            ]);
        Route::patch('/{id}',
            ['as'=>'roles.update',
                'uses'=>'RolesController@update',
                'middleware' => ['permission:delete-role']
            ]);
        Route::delete('/{id}',
            ['as'=>'roles.destroy',
                'uses'=>'RolesController@destroy',
                'middleware' => ['permission:delete-role']
            ]);
    });
    Route::group(['prefix' => '/departments'], function(){
        Route::get('/',
            ['as'=>'departments.index',
                'uses'=>'DepartmentsController@index',
                'middleware' => ['permission:list-department|create-department|edit-department|delete-department']
            ]);
        Route::get('/create',
            ['as'=>'departments.create',
                'uses'=>'DepartmentsController@create',
                'middleware' => ['permission:create-department']
            ]);
        Route::post('/create',
            ['as'=>'departments.store',
                'uses'=>'DepartmentsController@store',
                'middleware' => ['permission:create-department']
            ]);
        Route::get('/{id}',
            ['as'=>'departments.show',
                'uses'=>'DepartmentsController@show',
                'middleware' => ['permission:list-department']
            ])->where('id', '[0-9]+');
        Route::get('/{id}/edit',
            ['as'=>'departments.edit',
                'uses'=>'DepartmentsController@edit',
                'middleware' => ['permission:edit-department']
            ])->where('id', '[0-9]+');
        Route::patch('/{id}',
            ['as'=>'departments.update',
                'uses'=>'DepartmentsController@update',
                'middleware' => ['permission:edit-department']
            ])->where('id', '[0-9]+');
        Route::delete('/{id}',
            ['as'=>'departments.destroy',
                'uses'=>'DepartmentsController@destroy',
                'middleware' => ['permission:delete-department']
            ])->where('id', '[0-9]+');
    });
});
