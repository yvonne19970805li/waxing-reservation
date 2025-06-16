<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // 預約記錄
        Schema::create('reservation_records', function (Blueprint $table) {
            $table->id()->primary();
            $table->string('line_id')->comment('會員line_id')->index();
            $table->integer('date_id')->comment('預約日期id')->index();
            $table->string('date')->comment('預約日期');
            $table->integer('time_id')->comment('預約時間id')->index();
            $table->string('time')->comment('預約時間');
            $table->integer('services_id')->comment('服務項目id')->index();
            $table->integer('price')->comment('價格');
            $table->string('remark')->comment('備註')->default('');
            $table->timestamps();
        });

        // 預約日期
        Schema::create('reservation_dates', function (Blueprint $table) {
            $table->id();
            $table->date('date')->comment('預約日期');
            $table->string('remark')->comment('備註')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });

        // 預約時間
        Schema::create('reservation_times', function (Blueprint $table) {
            $table->id();
            $table->integer('date_id')->comment('預約時間id')->index();
            $table->string('time')->comment('預約時間');
            $table->string('remark')->comment('備註')->default('');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reservation_records');
        Schema::dropIfExists('reservation_dates');
        Schema::dropIfExists('reservation_times');
    }
};
