<?php

use App\Models\Cover;
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
        Schema::create('cover_color_view', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(ViewColor::class);
            $table->foreignIdFor(Cover::class);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cover_color_view');
    }
};
