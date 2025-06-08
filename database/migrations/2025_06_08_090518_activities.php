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
        // 活動
        Schema::create('activities', function (Blueprint $table) {
            $table->id();
            $table->string('activity')->comment('活動項目')->default('');
            $table->integer('price')->comment('價格')->default(0);
            $table->text('remark')->comment('備註');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('activities');
    }
};
