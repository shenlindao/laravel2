<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\PdfGeneratorController;
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

Route::get('/', [UserController::class, 'create']);

Route::get('/users', [UserController::class, 'index']);

Route::get('/user/{id}', [UserController::class, 'get'])->name('user.get');

Route::post('store-user', [UserController::class, 'store']);

Route::get('/resume/{id}', [PdfGeneratorController::class, 'index']);