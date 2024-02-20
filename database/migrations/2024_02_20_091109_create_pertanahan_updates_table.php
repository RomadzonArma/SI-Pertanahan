<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePertanahanUpdatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('aset_point_update', function (Blueprint $table) {
            $table->id();
            $table->integer('aset_point_id')->nullable();
            $table->string('nomor_sertifikat')->nullable();
            $table->string('nama_sertifikat')->nullable();
            $table->string('penggunaan_saat_ini')->nullable();
            $table->string('sertifikat_file')->nullable();
            $table->timestamps(0); // created_at dan updated_at menggunakan datetime(0)
            $table->softDeletes(0); // deleted_at menggunakan datetime(0)

            // Index
            $table->primary('id');
            $table->index(['id', 'aset_point_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('aset_point_update');
    }
}
