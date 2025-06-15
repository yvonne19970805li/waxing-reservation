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
        // 服務項目
        Schema::create('services', function (Blueprint $table) {
            $table->id();
            $table->integer('part_id')->comment('部位id')->index();
            $table->integer('part_detail_id')->comment('細項id')->index();
            $table->integer('price')->comment('價格');
            $table->string('remark')->comment('備註')->default('');
            $table->timestamps();
        });

        // 服務部位
        Schema::create('services_parts', function (Blueprint $table) {
            $table->id();
            $table->string('name')->comment('名稱');
            $table->timestamps();
        });

        // 服務部位-細項
        Schema::create('services_parts_detail', function (Blueprint $table) {
            $table->id();
            $table->string('name')->comment('名稱');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('services');
        Schema::dropIfExists('services_parts');
        Schema::dropIfExists('services_parts_detail');
    }
};
