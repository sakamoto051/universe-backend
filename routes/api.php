<?php

use App\Http\Controllers\CommentController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ThreadController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\dummyAPI;
use App\Http\Controllers\UserController;

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/user', function (Request $request) {
        return $request->user();
    });
    Route::get('/logout', [LoginController::class, 'logout']);
    Route::resource('thread', ThreadController::class);
    Route::resource('comment', CommentController::class);
    Route::get('/thread_list', [ThreadController::class, 'list']);
    Route::get('/thread_ids', [ThreadController::class, 'ids']);
    Route::get('/thread_detail/{thread_id}', [ThreadController::class, 'thread_detail']);
    Route::get('/my_thread/{user_id}', [ThreadController::class, 'myThread']);
});

Route::get('/data', [dummyAPI::class, 'getData']);

Route::resource('user', UserController::class);
