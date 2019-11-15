<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePeminjamenTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('peminjamen', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('kartu_id');
            $table->unsignedInteger('inventaris_id');
            $table->boolean('status')->default(0);
            $table->unsignedInteger('jumlah');
            $table->string('tanggal_peminjaman');
            $table->string('tanggal_pengembalian')->nullable();
            $table->timestamps();

            $table->foreign('kartu_id')->references('id')->on('kartus')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('inventaris_id')->references('id')->on('inventaris')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('peminjamen');
    }
}
