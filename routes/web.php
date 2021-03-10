<?php

use Illuminate\Support\Facades\Auth;
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
Route::redirect('/', '/members');
Route::redirect('/home', '/members');

Auth::routes();

Route::get('/members', 'MemberController@index')->name('admin.members');
Route::get('/members/create', 'MemberController@create')->name('admin.members.create');
Route::post('/members/store', 'MemberController@store')->name('admin.members.store');
Route::get('/member/show/{member}', 'MemberController@show')->name('admin.members.show');
Route::get('/member/edit/{member}', 'MemberController@edit')->name('admin.members.edit');
Route::put('/member/update/{member}', 'MemberController@update')->name('admin.member.update');
Route::delete('/member/destroy/{member}', 'MemberController@destroy')->name('admin.members.destroy');
Route::put('/member/approve/{member}', 'MemberController@approve')->name('admin.members.approve');
Route::put('/member/reject/{member}', 'MemberController@reject')->name('admin.members.reject');
