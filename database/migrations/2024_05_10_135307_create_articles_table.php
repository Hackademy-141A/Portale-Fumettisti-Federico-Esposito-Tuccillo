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
        Schema::create('articles', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('subtitle');
            $table->text('article_description');
            $table->string('image')->nullable();
            $table->unsignedBigInteger('author_id')->nullable();
            $table->foreign('author_id')->references('id')->on('users')->onDelete('SET NULL');
            $table->unsignedBigInteger('category_id')->nullable();
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('SET NULL');
            $table->timestamps();
            
            $table->string('comic_number')->nullable();
            $table->string('comic_year')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('articles');
    }

    
};
