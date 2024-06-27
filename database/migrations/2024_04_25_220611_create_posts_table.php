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
        Schema::create('Posts', function (Blueprint $table) {
            $table->id();
            $table->string('Post_name');
            $table->text('description'); // Using text for longer descriptions
            $table->text('post_body'); // Using text for longer post_body
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('Posts');
    }
};
