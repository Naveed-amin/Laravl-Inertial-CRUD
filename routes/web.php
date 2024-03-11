<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\PostsController;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return Inertia::render('app');
});
Route::resource('posts',PostsController::class)->middleware('auth');

Route::get('auth/users',[AuthController::class, 'users'])->name('user.index');
Route::get('auth/user/{id}/edit',[AuthController::class, 'editUser']);
Route::put('auth/user/{id}',[AuthController::class, 'updateUser']);
Route::get('register',[AuthController::class,'register']);
Route::post('register',[AuthController::class,'registerStore']);
Route::delete('auth/user/{id}',[AuthController::class, 'deleteUser']);

Route::get('auth/login',[AuthController::class,'loginPage']);
Route::post('auth/login',[AuthController::class, 'loginUser']);


