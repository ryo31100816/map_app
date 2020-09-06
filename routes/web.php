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
    return redirect('/members');
});

Route::get('/members','MemberController@index')->name('member.list');
Route::get('/member/new','MemberController@create')->name('member.new');
Route::get('/member/{id}','MemberController@show')->name('member.show');
Route::get('/member/edit/{id}','MemberController@edit')->name('member.edit');
Route::post('/member','MemberController@store')->name('member.store');
Route::post('/member/update/{id}','MemberController@update')->name('member.update');
Route::delete('/member/{id}','MemberController@destroy')->name('member.delete');

Route::get('/locations','LocationController@index')->name('location.list');
Route::get('/location/new','LocationController@create')->name('location.new');
Route::get('/location/{id}','LocationController@show')->name('location.show');
Route::get('/location/edit/{id}','LocationController@edit')->name('location.edit');
Route::post('/location','LocationController@store')->name('location.store');
Route::post('/location/update/{id}','LocationController@update')->name('location.update');
Route::delete('/location/{id}','LocationController@destroy')->name('location.delete');

Route::get('/histories','HistoryController@index')->name('history.list');
Route::get('/history/{id}','HistoryController@show')->name('history.show');
Route::post('/history','HistoryController@store')->name('history.store');

Route::get('/headquarters/1','HeadquartersController@show')->name('headquarters.show');
Route::get('/headquarters/edit/{id}','HeadquartersController@edit')->name('headquarters.edit');
Route::post('/headquarters/update/{id}','HeadquartersController@update')->name('headquarters.update');