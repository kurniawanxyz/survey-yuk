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
        Schema::create('kriterias', function (Blueprint $table) {
            $table->id();
            $table->foreignId('survei_id')->constrained()->onDelete('cascade')->onUpdate('cascade');
            $table->string('text');
            $table->double('nilaiMaks');
            $table->double('nilaiMin');
            $table->enum("style",["hijau","kuning","merah","biru"]);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kriterias');
    }
};
