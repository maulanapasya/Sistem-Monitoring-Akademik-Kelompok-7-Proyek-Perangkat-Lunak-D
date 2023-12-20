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
        Schema::create('k_h_S', function (Blueprint $table) {
            $table->id();
            $table->string('mahasiswa_id');
            $table->string('semester');
            $table->integer('skssemester');
            $table->integer('skskumulatif');
            $table->float('ipsemester');
            $table->float('ipkumulatif');
            $table->string('scankhs')->nullable();
            $table->boolean('isverified')->default('0');
            $table->timestamps();
            $table->foreign('mahasiswa_id')->references('nim')->on('mahasiswas');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('k_h_s', function (Blueprint $table) {
            $table->dropForeign(['mahasiswa_id']);
        });

        Schema::dropIfExists('KHS');
    }
};
