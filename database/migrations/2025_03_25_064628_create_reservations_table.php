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
        //預約記錄總表
        Schema::create('reservationRecords', function (Blueprint $table) {
            $table->id()->primary();
            $table->string('line_id')->comment('預約人id')->default('');
            $table->string('appointmentDate_id')->comment('預約日期id')->default('');
            $table->date('appointmentDate')->comment('預約日期');
            $table->string('appointmentTime_id')->comment('預約時段id')->default('');
            $table->string('appointmentTime')->comment('預約時段')->default('');
            $table->string('areaPart_id')->comment('除毛部位id')->default('');
            $table->string('areaPart')->comment('除毛部位')->default('');
            $table->timestamps();
        });

        //除毛區域目錄
        Schema::create('areas', function (Blueprint $table) {
            $table->id();
            $table->string('area')->comment('區域目錄')->default('');
            $table->timestamps();
        });

        //除毛細項目
        Schema::create('areaParts', function (Blueprint $table) {
            $table->id();
            $table->string('part')->comment('細項目')->default('');
            $table->integer('price')->comment('價格')->default(0);
            $table->text('note')->comment('備註');
            $table->timestamps();
        });

        //活動目錄
        Schema::create('activities', function (Blueprint $table) {
            $table->id();
            $table->string('activity')->comment('活動項目')->default('');
            $table->integer('price')->comment('價格')->default(0);
            $table->text('note')->comment('備註');
            $table->timestamps();
        });
        
        //預約日期
        Schema::create('appointmentDates', function (Blueprint $table) {
            $table->id();
            $table->date('date')->comment('預約日期');
            $table->text('note')->comment('備註');
            $table->timestamps();
        });

        //預約時間
        Schema::create('appointmentTimes', function (Blueprint $table) {
            $table->id();
            $table->string('time')->comment('預約時段')->default('');
            $table->text('note')->comment('備註');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reservationRecords');
        Schema::dropIfExists('areas');
        Schema::dropIfExists('areaParts');
        Schema::dropIfExists('activities');
        Schema::dropIfExists('appointmentDates'); 
        Schema::dropIfExists('appointmentTimes'); 
    }
};
