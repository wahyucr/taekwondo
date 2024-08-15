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
        Schema::create('pendaftarans', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('nik');
            $table->string('nm_lengkap');
            $table->enum('j_kelamin', ['laki-laki', 'perempuan']);
            $table->string('tmpt_lahir');
            $table->date('tgl_lahir');
            $table->integer('usia');
            $table->integer('berat_badan');
            $table->integer('tinggi_badan');
            $table->string('gol_darah');
            $table->string('agama');
            $table->string('tmpt_dojang');
            $table->foreignid('geup_id')->constrained('geups');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pendaftarans');
    }
};