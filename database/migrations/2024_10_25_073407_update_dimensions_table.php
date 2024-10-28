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
        Schema::table('dimensions', function (Blueprint $table) {
            $table->string("thicknesse")->nullable();
            $table->integer("height_unit")->nullable();
            $table->string('dimension')->virtualAs('concat(height, \' * \', width)')->nullable()->change();
            $table->integer("weight_unit")->nullable();
            $table->integer('width')->nullable()->change();
            $table->integer('height')->nullable()->change();
            $table->string("weight")->nullable();
           
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('dimensions', function (Blueprint $table) {
            $table->dropColumn('thicknesse');
            $table->dropColumn('height_unit');
            $table->dropColumn('weight_unit');
            $table->dropColumn("weight");
            $table->integer('width')->change();
            $table->integer('height')->change();
            $table->string('dimension')->virtualAs('concat(height, \' * \', width)')->change();
        });
    }
};
