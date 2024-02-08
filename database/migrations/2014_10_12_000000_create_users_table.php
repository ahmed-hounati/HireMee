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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('picture')->nullable();
            $table->string('title')->nullable();
            $table->text('about')->nullable();
            $table->string('phone')->nullable();
            $table->string('post')->nullable();
            $table->string('address')->nullable();
            $table->string('email')->unique();
            $table->string('password');
            $table->enum('role', ['admin', 'user', 'entreprise'])->default('user');
            $table->string('logo')->nullable();
            $table->string('slogan')->nullable();
            $table->string('industries')->nullable();
            $table->string('description')->nullable();
            $table->timestamps();
        });
    }

};
