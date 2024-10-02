<?php

use App\Models\Attribute;
use App\Models\Color;
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
        Schema::create('dimensions', function (Blueprint $table) {
            $table->id();
            $table->integer('width');
            $table->integer('height');
            $table->decimal('price', 10, 2);
            $table->string('code')->unique()->nullable();
            $table->string("image_reference")->nullable();
            $table->foreignIdFor(App\Models\Product::class)->constrained()->cascadeOnDelete();
            $table->string('dimension')->virtualAs('concat(height, \' * \', width)');
            $table->foreignIdFor(Color::class)->nullable()->constrained()->cascadeOnDelete();
            $table->boolean('status')->default(true);
            $table->string('slug')->unique();
            $table->foreignIdFor(Attribute::class)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dimensions');
    }
};
