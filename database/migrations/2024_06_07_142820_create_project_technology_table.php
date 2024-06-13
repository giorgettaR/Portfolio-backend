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
        Schema::create('project_technology', function (Blueprint $table) {
            
            $table->foreignId('project_id')->constrained()->onDelete('cascade');
            // $table->unsignedBigInteger('project_id');
            // $table->foreign('project_id')->references('id')->on('technologies')->onDelete('cascade');
            
            $table->foreignId('technology_id')->constrained()->onDelete('cascade');
            // $table->unsignedBigInteger('technology_id');
            // $table->foreign('technology_id')->references('id')->on('projects')->onDelete('cascade');
            $table->primary(['project_id', 'technology_id']);
            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('project_technology');
    }
};
