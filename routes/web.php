<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LineAuthController;


Route::get('/', function () {
    return view('welcome');
});

/**
 * line登入api 第一隻是取得
 * 第二隻是自動回調
 */
Route::get('/auth/line', [LineAuthController::class, 'redirectToLine']);
Route::get('/auth/line/callback', [LineAuthController::class, 'returnLineCallback']);
