<?php

use App\Http\Controllers\AdvertisementController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
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
Auth::routes();

Route::get('/', [HomeController::class, 'index']);
Route::get('/advertisements/{slug}', [AdvertisementController::class, 'show'])->name('ads.show');
Route::get('/publish', [AdvertisementController::class, 'create'])->name('ads.create');
Route::post('/publish', [AdvertisementController::class, 'store'])->name('ads.store')->middleware('auth');
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

Route::get('/advertisements/{advertisement}/edit', [AdvertisementController::class, 'edit'])->name('ads.edit')->middleware('auth');
Route::put('/advertisements/{advertisement}/update', [AdvertisementController::class, 'update'])->name('ads.update')->middleware('auth');
Route::get('/advertisements/{advertisement}/delete', [AdvertisementController::class, 'delete'])->name('ads.delete')->middleware('auth');
