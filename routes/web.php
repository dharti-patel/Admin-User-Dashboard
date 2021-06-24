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
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/display-users', [App\Http\Controllers\DashboardController::class, 'displayUsers']);
Route::get('/edit-user-info/{id}', [App\Http\Controllers\DashboardController::class, 'editUserInfo']);
Route::put('/update-user/{id}', [App\Http\Controllers\DashboardController::class, 'updateUserInfo']);
Route::get('/user-profile/{id}', [App\Http\Controllers\DashboardController::class, 'displayUserInfo']);

Route::get('auth/{provider}', [App\Http\Controllers\Auth\RegisterController::class, 'redirectToProvider']);
Route::get('auth/{provider}/callback', [App\Http\Controllers\Auth\RegisterController::class, 'handleProviderCallback']);



