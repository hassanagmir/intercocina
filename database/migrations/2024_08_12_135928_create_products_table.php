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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('es_name')->nullable();
            $table->string('price')->nullable();
            $table->string('old_price')->nullable();
            $table->text('description')->nullable();
            $table->string('code')->unique()->nullable();
            $table->foreignIdFor(App\Models\Type::class)->constrained()->cascadeOnDelete();
            $table->text('content')->nullable();
            $table->json('options')->nullable();
            $table->boolean('status')->default(true);
            $table->string('slug')->unique();
            $table->string('tags')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
