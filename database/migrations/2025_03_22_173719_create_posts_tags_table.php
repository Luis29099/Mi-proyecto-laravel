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
        Schema::create('posts_tags', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('post_id')->unique();
            $table-> foreign('post_id')
            ->references('id')
            ->on('posts')
            ->onDelete('cascade')
            ->onUpdate('cascade');
            //segunda llave foranea
            $table->unsignedBigInteger('tag_id')->unique();
            $table-> foreign('tag_id')
            ->references('id')
            ->on('tags')
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
        Schema::dropIfExists('posts_tags');
    }
};
