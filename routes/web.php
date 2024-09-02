<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\WhmController;

Route::get('/', function () {
    return view('welcome');
});


Route::get("/posts", [PostController::class, 'index']);
Route::get("/posts/{id}", [PostController::class, 'show']);
// Route::get("/whm/{function}", [WhmController::class, 'getAppList']);
Route::get("/whm/change-password", [WhmController::class, 'changePassword']);
