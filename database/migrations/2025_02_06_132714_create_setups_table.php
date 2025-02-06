<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    
    public function up(): void
    {
        Schema::create('setups', function (Blueprint $table) {
            $table->string('author');
            $table->string('name', 30);
            $table->string('vehicle');
            $table->string('track');
            $table->integer('likes');
            $table->integer('downloads');
            $table->timestamps();

            $table->primary(['author','name']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('setups');
    }
};
