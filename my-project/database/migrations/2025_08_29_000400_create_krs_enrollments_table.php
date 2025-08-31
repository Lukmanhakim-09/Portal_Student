<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('krs_enrollments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->string('kode_mk');
            $table->string('nama_mk');
            $table->unsignedTinyInteger('sks');
            $table->string('kelas', 10);
            $table->string('hari', 20)->nullable();
            $table->time('mulai')->nullable();
            $table->time('selesai')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('krs_enrollments');
    }
}; 