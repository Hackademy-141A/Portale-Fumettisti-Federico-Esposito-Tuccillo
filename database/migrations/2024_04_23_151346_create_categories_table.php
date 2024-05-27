<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Category;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->timestamps();
        });

        $categories = [
            ['name' => 'Azione'],
            ['name' => 'Fantasy'],
            ['name' => 'Humor'],
            ['name' => 'Horror'],
            ['name' => 'Leggenda'],
            ['name' => 'Comedy'],
        ];
        foreach ($categories as $category) {
            Category::create([
                'name' => $category['name'],
            ]);
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('categories');
    }
};
