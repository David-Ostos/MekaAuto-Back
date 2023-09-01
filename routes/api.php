<?php

use App\Http\Controllers\NoteController;
use App\Http\Controllers\Store\PostsController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;



Route::post('/auth/register', [AuthController::class, 'createUser']);
Route::post('/auth/login', [AuthController::class, 'loginUser']);
//GOOGLE
Route::post('/auth/googleUser', [AuthController::class, 'googleUser']);
//Articles
Route::get('/post', [PostsController::class, 'index'])->name('posts.index');

// Protected routes
Route::middleware('auth:sanctum')->group(function () {
    Route::post('/auth/users', [UserController::class, 'getAuthenticatedUser'])->name('users.getAuthenticatedUser'); //good
    Route::post('/auth/logout', [AuthController::class, 'logoutUser']);

    //Articles
    Route::get('/note', [NoteController::class, 'index'])->name('posts.index');
    Route::get('/note/show', [NoteController::class, 'show'])->name('posts.show');
    Route::post('/note/store', [NoteController::class, 'store'])->name('posts.store'); //good
    Route::put('note/id', [NoteController::class, 'update'])->name('posts.update'); //good
    Route::delete('note/id', [NoteController::class, 'destroy'])->name('posts.delete');

});

