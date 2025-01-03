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
        Schema::create('panel_colors', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->integer('thickness');
            $table->string('image');
            $table->text('description')->nullable();
            $table->string('code')->nullable();
            $table->string('type')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('panel_colors');
    }
};
