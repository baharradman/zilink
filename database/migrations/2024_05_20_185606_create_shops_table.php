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
        Schema::create('shops', function (Blueprint $table) {
            
            $table->id();
            $table->string('title')->unique()->nullable();
            $table->string('description')->unique()->nullable();
            $table->string('address')->unique()->nullable();
            $table->text('profile_image')->nullable();
            $table->tinyInteger('status')->default(0);
            $table->tinyInteger('commentable')->default(0)->comment('0 => uncommentable, 1 => commentable');
            $table->foreignId('creator_id')->constrained('users');
            $table->foreignId('category_id')->constrained('categories');
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('shops');
    }
};
