<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ViewsController;
use App\Http\Controllers\BrandsController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SettingsController;
use App\Http\Controllers\AllowancesController;


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

Route::get('dashboard', [BrandsController::class, 'dashboard'])->name('dashboard');
Route::post('add_brand', [BrandsController::class, 'add_brand'])->name('add_brand');
Route::get('deleteBrand/{id}', [BrandsController::class, 'deleteBrand'])->name('deleteBrand');

Route::get('settings', [SettingsController::class, 'settings'])->name('settings');
Route::post('setAllowance', [SettingsController::class, 'setAllowance'])->name('setAllowance');
Route::post('setPrices', [SettingsController::class, 'setPrices'])->name('setPrices');

Route::post('register', [ProfileController::class, 'store']);
Route::get('login', [ProfileController::class, 'login']);
Route::post('logout', [ProfileController::class, 'logout']);
Route::post('session', [ProfileController::class, 'session'])->name('session');
Route::get('/', [ViewsController::class, 'home'])->name('home');

Route::get('allowance/{id}', [AllowancesController::class, 'allowance'])->name('allowance');
Route::post('addAllowance', [AllowancesController::class, 'addAllowance'])->name('addAllowance');
Route::get('deleteAllowance/{id}/{user_id}', [AllowancesController::class, 'deleteAllowance'])->name('deleteAllowance');


