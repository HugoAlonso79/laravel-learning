<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Dashboard\PostController;
use App\Http\Controllers\Dashboard\TestController;
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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/',[TestController::class, 'index']);
Route::resource('post', PostController::class);

// no son necesarias si se declara lo de arriba
// Route::get('post/', [PostController::class, 'index']);
// Route::get('post/{post}', [PostController::class, 'show']);
// Route::get('post/create', [PostController::class, 'create']);
// Route::get('post/{post}/edit', [PostController::class, 'edit']);
// Route::post('posts/{posts}', [PostController::class, 'store']);
// Route::put('posts/{posts}', [PostController::class, 'update']);
// Route::delete('posts/{posts}', [PostController::class, 'delete']);

