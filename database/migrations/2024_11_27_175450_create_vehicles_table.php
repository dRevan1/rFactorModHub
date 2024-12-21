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
        Schema::create('vehicles', function (Blueprint $table) {
            $table->string('author');
            $table->string('name', 50);
            $table->string('thumbnail')->nullable();
            $table->string('category');
            $table->string('description')->nullable();
            $table->integer('downloads')->unsigned();
            $table->integer('likes')->unsigned();
            $table->timestamps();

            $table->primary(['author','name']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vehicles');
    }
};
