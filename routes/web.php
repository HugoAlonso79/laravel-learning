<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Dashboard\PostController;
use App\Http\Controllers\Dashboard\CategoryController;
use App\Http\Controllers\Web\BlogController;

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
    return view('welcome');
});



Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::group(['prefix' => 'dashboard', 'middleware' => ['auth', 'admin']],function(){
    Route::get('/', function () {
        return view('dashboard');
    })->name('dashboard');
    Route::resources([
        'post'=> PostController::class, 
        'category' => CategoryController::class
    ]);
});

Route::group(['prefix' => 'blog'], function(){
    Route::controller(BlogController::class)->group(function(){
        Route::get('/', 'index')->name('web.blog.index');
        Route::get('/{post}', 'show')->name('web.blog.show');
    });
});

require __DIR__.'/auth.php';

// no son necesarias si se declara lo de arriba
// Route::get('post/', [PostController::class, 'index']);
// Route::get('post/{post}', [PostController::class, 'show']);
// Route::get('post/create', [PostController::class, 'create']);
// Route::get('post/{post}/edit', [PostController::class, 'edit']);
// Route::post('posts/{posts}', [PostController::class, 'store']);
// Route::put('posts/{posts}', [PostController::class, 'update']);
// Route::delete('posts/{posts}', [PostController::class, 'delete']);