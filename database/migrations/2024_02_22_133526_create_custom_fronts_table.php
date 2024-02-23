<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomFrontsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('custom_fronts', function (Blueprint $table) {
            $table->id();
            $table->string('judul');
            $table->string('title_header');
            $table->text('alamat');
            $table->string('email');
            $table->string('telp');
            $table->text('footer');
            $table->string('logo_header')->nullable();
            $table->string('logo_footer')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('custom_fronts');
    }
}
