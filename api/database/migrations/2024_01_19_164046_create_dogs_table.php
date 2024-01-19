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
        Schema::create('dogs', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('breed_id')->nullable();
            $table->unsignedBigInteger('size_id');
            $table->string('image');
            $table->string('name');
            $table->text('description');
            $table->string('color');
            $table->timestamps();

            $table->foreign('breed_id')->references('id')->on('breeds')->onDelete('cascade');
            $table->foreign('size_id')->references('id')->on('sizes');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dogs');
    }
};
