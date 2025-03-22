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
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->string('nombre',45);
            $table->string('slug',45);
            $table->string('extract',45);
            $table->string('body',45);
            $table->string('status',45);
            $table->unsignedBigInteger('category_id')->unique();
            $table-> foreign('category_id')
            ->references('id')
            ->on('categories')
            ->onDelete('cascade')
            ->onUpdate('cascade');
            
            $table->unsignedBigInteger('user_id')->unique();
            $table-> foreign('user_id')
            ->references('id')
            ->on('users_1')
            ->onDelete('cascade')
            ->onUpdate('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('posts');
    }
};
