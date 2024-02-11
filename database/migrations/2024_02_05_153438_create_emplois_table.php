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
        Schema::create('emplois', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users');
            $table->string('image')->nullable();
            $table->string('title')->nullable();
            $table->string('description')->nullable();
            $table->json('competences');
            $table->enum('contract', ['à distance', 'hybrid', 'à temps plein'])->default('à temps plein');
            $table->string('emplacement')->nullable();
            $table->timestamps();
        });
    }

};
