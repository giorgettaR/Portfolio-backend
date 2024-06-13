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
        Schema::create('projects', function (Blueprint $table) {
            $table->id();

            $table->string('title', 150);
            $table->string('slug')->unique();
            $table->text('description');
            $table->string('repository_link', 500);
            $table->string('languages', 200);
            $table->string('softwares', 200);
            $table->string('authors', 200);
            $table->string('image_link', 500);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('projects');
    }
};
