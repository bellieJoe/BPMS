<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

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

Route::get('/home', function () {
    return view('welcome');
})->name('home');
Route::get('/dashboard', function () {
    return view('main.dashboard');
})->name('dashboard');
Route::get('/', function () {
    return redirect(route('home'));
});
Route::get('/test', function () {
    return json_encode(auth()->user());
})->name('test');

Route::group(['prefix' => 'auth', 'as' => 'auth.'], function(){
    Route::view('signin', 'auth.signin')->name('signin')->middleware('guest');
    Route::view('login', 'auth.login')->name('login')->middleware('guest');
    Route::view('signup', 'auth.signup')->name('signup')->middleware('guest');
    Route::get('logout', [UserController::class, 'logout'])->name('logout');
    Route::post('store', [UserController::class, 'store'])->name('store');
    Route::post('authenticate', [UserController::class, 'authenticate'])->name('authenticate');
});
