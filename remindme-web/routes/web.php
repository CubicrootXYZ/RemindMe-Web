<?php

use App\Http\Controllers\LegalController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\UserController;
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

// Legal stuff
Route::get('/inprint', [LegalController::class, 'inprint']);
Route::get('/privacy-policy', [LegalController::class, 'privacyPolicy']);

// Overviews
Route::get('/', [MainController::class, 'overview'])->middleware('auth.basic.remindme');

// User
Route::get('/user', [UserController::class, 'list'])->middleware('auth.basic.remindme');
Route::post('/user/{id}', [UserController::class, 'changeUser'])->middleware('auth.basic.remindme');
