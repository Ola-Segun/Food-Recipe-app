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
        Schema::create('recipes', function (Blueprint $table) {
            $table->id();
            $table->string('recipe_name');
            $table->text('description'); // Using text for longer descriptions
            $table->string('avg_cooking_time');
            $table->text('ingredients'); // Using text for longer lists of ingredients
            $table->text('procedures'); // Using text for longer procedures
            $table->text('tools_needed'); // Using text for longer lists of tools needed
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('recipes');
    }
};
