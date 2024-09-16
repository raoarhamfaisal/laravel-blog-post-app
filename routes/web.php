<?php

use App\Http\Controllers\PostController;
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


// Users routes
Route::get('/', [UserController::class, "showCorrectHomepage"])->name('login');
Route::post('/register', [UserController::class, 'register'])->middleware('guest');;
Route::post('/login', [UserController::class, 'login'])->middleware('guest');
Route::post('/logout', [UserController::class, 'logout'])->middleware('mustBeLoggedIn');


// Post routes
Route::get('/create-post', [PostController::class, 'showCreatePost'])->middleware('mustBeLoggedIn');
Route::post('/create-post', [PostController::class, 'storeCreatePost'])->middleware('mustBeLoggedIn');
Route::get('/post/{post}', [PostController::class, 'viewSinglePost'])->middleware('mustBeLoggedIn');
Route::delete('/post/{post}', [PostController::class, 'delete'])->middleware('mustBeLoggedIn');


// profile routs

Route::get('/profile/{user:username}', [UserController::class, 'profile'])->middleware('mustBeLoggedIn');
