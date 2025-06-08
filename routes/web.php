<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LineAuthController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\AppointmentDateController;
use App\Models\AppointmentDate;
use Illuminate\Routing\Route as RoutingRoute;
use Symfony\Component\Routing\Attribute\Route as AttributeRoute;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/edit', function () {
    return view('signUp_edit');
});

//line登入api 第一隻是取得
//第二隻是自動回調
Route::get('/auth/line', [LineAuthController::class, 'redirectToLine']);
Route::get('/auth/line/callback', [LineAuthController::class, 'returnLineCallback']);

//新註冊填寫資料
Route::post('/signUp', [LineAuthController::class, 'signUp']);

//傳送到view
Route::get('/reservation/show', [ReservationController::class, 'ReservationShow']);

//接收預約資料
Route::get('/reservation/store', [ReservationController::class, 'store']);

//預約成功後導向到reservationComplete的blade
Route::get('/reservation/complete', function () {
    return view('reservationComplete');
});

/**
 * 管理者設定預約項目、時間
 */

//選擇月份
Route::get('/add/month', function () {
    return view('addmonth');
});

//月份選完後會帶著迴圈寫好的資料自動跳轉到這頁，顯示指定月份的日期
Route::get('/add/date' , [AppointmentDateController::class, 'showDate']);

//儲存選擇的日期跟時間
Route::post('/add/date/store' , [AppointmentDateController::class, 'store']);
