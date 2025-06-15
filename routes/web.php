<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\ReservationDatesController;
use App\Http\Controllers\AdminsController;
use App\Repositories\ReservationDatesRepository;

// 會員相關 API
Route::prefix('member')->group(function () {
    // 透過Line取得會員資料
    Route::get('/login', [MemberController::class, 'Login']);
    // Line資料回調
    Route::get('/line/callback', [MemberController::class, 'LineCallback']);
    // 編輯會員資料
    Route::put('/edit', [MemberController::class, 'Edit']);
});

//編輯日期
Route::post('/EditDate' , [ReservationDatesController::class, 'Creates']);


// 管理員用 API
Route::prefix('admin')->group(function () {
    // 登入
    Route::get('/login', [AdminsController::class, 'AdminLogin']);
    // 登出
    Route::get('/logout', function () {
    });
    // 新增服務項目
    // 新增服務項目細項

    
});