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
        Schema::create('emploi', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('title');
            $table->string('description');
            $table->string('competences');
            $table->enum('contract', ['à distance', 'hybrid', 'à temps plein'])->default(' temps plein');
            $table->string('emplacement');
        });
    }

};
