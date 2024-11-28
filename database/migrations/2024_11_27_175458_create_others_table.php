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
        Schema::create('other', function (Blueprint $table) {
            $table->foreign('login')->references('name')->on('users');
            $table->string('name', length:50)->primary();
            $table->date('creation_date')->default(now()->format('d-m-Y'));
            $table->date('update_date');
            $table->enum('categories', ['HUD', 'Skins']);
            $table->string('description')->nullable();
            $table->integer('downloads')->unsigned()->default(0);
            $table->integer('likes')->unsigned()->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('other');
    }
};
