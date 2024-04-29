<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ResourceController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CommentController;
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

Route::get('post', [PostController::class, 'index']);
Route::delete('post', [PostController::class, 'destroy']);

Route::get('post/create', [PostController::class, 'create']);
Route::post('post/create', [PostController::class, 'store']);

Route::get('post/show', [PostController::class, 'show']);

Route::get('post/edit', [PostController::class, 'edit']);
Route::post('post/edit', [PostController::class, 'update']);



//Commentコントローラへの記述
Route::get('comment', [CommentController::class, 'create']);
Route::post('comment/create', [CommentController::class, 'store']);

Route::get('comment/edit', [CommentController::class, 'edit']);
Route::post('comment/edit', [CommentController::class, 'update']);
Route::delete('comment/edit', [CommentController::class, 'destroy']);




Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');




Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
