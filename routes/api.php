<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\ReservationDatesController;
use App\Http\Controllers\AdminsController;
use App\Http\Controllers\ReservationTimesController;
use App\Http\Controllers\ReservationOverallsController;
use App\Models\ReservationOveralls;

// 會員相關 API
Route::prefix('member')->group(function () {
    // 透過Line取得會員資料
    Route::get('/login', [MemberController::class, 'Login']);
    // Line資料回調
    Route::get('/line/callback', [MemberController::class, 'LineCallback']);
    // 編輯會員資料
    Route::put('/edit', [MemberController::class, 'Edit']);
});

//預約日期
Route::prefix('Date')->group(function () {
    //新增可預約日期
    Route::post('/Edit' , [ReservationDatesController::class, 'Create']);
    //刪除預約日期
    Route::delete('/Delete' , [ReservationDatesController::class, 'Delete']);
    //搜尋可預約日期
    Route::get('/Search' , [ReservationDatesController::class, 'Search']);
    
});

//預約時間
Route::prefix('Time')->group(function () {
    //新增可預約時間
    Route::post('/Edit' , [ReservationTimesController::class, 'Add']);
    //儲存要開放的時間
    Route::put('/Open' , [ReservationTimesController::class, 'Save']);
    //搜尋開放時段
    Route::get('/Search' , [ReservationTimesController::class, 'Search']);

});

//預約時段總覽
Route::prefix('Overall')->group(function () {
    //新增可預約時+日
    Route::post('/Add' , [ReservationOverallsController::class, 'Add']);
    Route::get('Search' , [ReservationOverallsController::class, 'Search']);
});


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