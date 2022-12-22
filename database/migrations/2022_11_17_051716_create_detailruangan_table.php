<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetailruanganTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detail_ruangans', function (Blueprint $table) {
            $table->id();
            $table->string('foto');
            $table->double('harga');
            $table->string('nama');
            $table->string('alamat');
            $table->string('kapasitas');
            $table->string('fasilitas');
            $table->string('luas');
            $table->foreignId('kategori_id')->constrained('kategoris')->onDelete('restrict');
            $table->string('deskripsi');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('detail_ruangans');
    }
}
