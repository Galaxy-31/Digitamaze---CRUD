<?php

use App\Http\Controllers\DataController;
use App\Http\Controllers\GuruController;
use App\Http\Controllers\RuanganController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\UserController;
use App\Models\Guru;
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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes([
    'register' => false
]);

Route::group(['middleware' => ['auth']], function ()
{
    Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::group(['middleware' => ['role:Admin']], function ()
    {
        Route::resource('/ruangans', RuanganController::class);
        Route::resource('/gurus', GuruController::class);
        Route::resource('/siswas', SiswaController::class);
        Route::resource('/datas', DataController::class);
        
    });
});


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
