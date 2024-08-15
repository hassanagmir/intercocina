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
        Schema::create('order_items', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(App\Models\Order::class)->constrained()->cascadeOnDelete();
            $table->foreignIdFor(App\Models\Product::class)->constrained()->cascadeOnDelete();
            $table->foreignIdFor(App\Models\Dimension::class)->constrained()->cascadeOnDelete();
            $table->string('color')->nullable();
            $table->integer('quantity');
            $table->decimal('total', 10, 2);
            $table->boolean('status')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('order_items');
    }
};