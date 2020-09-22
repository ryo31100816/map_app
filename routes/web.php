<?php

use Illuminate\Support\Facades\Route;
use App\Headquarters;

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
    return redirect('/member');
});

Route::middleware(['auth'])->group(function() {
    Route::group(['prefix' => '/member', 'as' => 'member.'], function () {
        Route::get('/', [
            'as' => 'list',
            'uses' => 'MemberController@index'
        ]);
        Route::get('/new', [
            'as' => 'new',
            'uses' => 'MemberController@create'
        ]);
        Route::get('/{id}', [
            'as' => 'show',
            'uses' => 'MemberController@show'
        ]);
        Route::get('/edit/{id}', [
            'as' => 'edit',
            'uses' => 'MemberController@edit'
        ]);
        Route::post('/', [
            'as' => 'store',
            'uses' => 'MemberController@store'
        ]);
        Route::post('/update/{id}', [
            'as' => 'update',
            'uses' => 'MemberController@update'
        ]);
        Route::delete('/{id}', [
            'as' => 'delete',
            'uses' => 'MemberController@destroy'
        ]);
    });

    Route::group(['prefix' => '/location', 'as' => 'location.'], function() {
        Route::get('/', [
            'as' => 'list',
            'uses' => 'LocationController@index'
        ]);
        Route::get('/new', [
            'as' => 'new',
            'uses' => 'LocationController@create'
        ]);
        Route::get('/{id}', [
            'as' => 'show',
            'uses' => 'LocationController@show'
        ]);
        Route::get('/edit/{id}', [
            'as' => 'edit',
            'uses' => 'LocationController@edit'
        ]);
        Route::post('/', [
            'as' => 'store',
            'uses' => 'LocationController@store'
        ]);
        Route::post('/update/{id}', [
            'as' => 'update',
            'uses' => 'LocationController@update'
        ]);
        Route::delete('/{id}', [
            'as' => 'delete',
            'uses' => 'LocationController@destroy'
        ]);
    });

    Route::group(['prefix' => '/history', 'as' => 'history.'], function() {
        Route::get('/', [
            'as' => 'list',
            'uses' => 'HistoryController@index'
        ]);
        Route::get('/member/{id}', [
            'as' => 'getByMemberId',
            'uses' => 'MemberHistoryController@getByMemberId'
        ]);
        Route::get('/member/{id}/new', [
            'as' => 'new',
            'uses' => 'HistoryController@create'
        ]);
        Route::get('/{id}', [
            'as' => 'show',
            'uses' => 'HistoryController@show'
        ]);
        Route::post('/', [
            'as' => 'store',
            'uses' => 'HistoryController@store'
        ]);
    });

    Route::group(['prefix' => 'headquarters', 'as' => 'headquarters.'], function() {
        Route::get('/1', [
            'as' => 'show',
            'uses' => 'HeadquartersController@show'
        ]);
        Route::group(['middleware' => ['can:admin']], function() {
            Route::get('/edit/{id}', [
                'as' => 'edit',
                'uses' => 'HeadquartersController@edit'
            ]);
            Route::post('/update/{id}', [
                'as' => 'update',
                'uses' => 'HeadquartersController@update'
            ]);
        });
    });
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');