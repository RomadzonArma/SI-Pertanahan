<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePertanahanFotosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('aset_point_foto', function (Blueprint $table) {
            $table->id();
            $table->integer('aset_point_id')->nullable();
            $table->string('foto_file')->nullable();
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
        Schema::dropIfExists('aset_point_foto');
    }
}
