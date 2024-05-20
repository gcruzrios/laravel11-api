<?php

use App\Http\Controllers\Api\PostController;
use App\Http\Controllers\Api\ProductController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::apiResource('posts', PostController::class)->except([
    'create', 'edit'
]);

Route::get('/post/{id}', [PostController::class, 'show']);

Route::apiResource('products', ProductController::class)->except([
    'create', 'edit'
]);



Route::apiResource('products', ProductController::class)->only([
    'index', 'show'
]);

Route::get('/product/{id}', [ProductController::class, 'show']);

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
Route::middleware('auth:sanctum')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout']);
});