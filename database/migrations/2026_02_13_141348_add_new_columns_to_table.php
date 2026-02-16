<?php

use App\Models\Color;
use App\Models\ViewColor;
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
        Schema::table('covers', function (Blueprint $table) {
        
            $table->string('subtitle')->nullable();
            $table->integer('price')->nullable();
            $table->integer('old_price')->nullable();
            $table->boolean('is_new')->default(0);
            $table->boolean('is_main')->default(1);
            $table->boolean('is_public')->default(1);
            $table->text('description')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('covers', function (Blueprint $table) {
            $table->dropColumn([
                // 'color_id',
                // 'view_color_id',
                'subtitle',
                'price',
                'old_price',
                'is_new',
                'is_main',
                'is_public',
                'description'
            ]);
        });
    }
};
