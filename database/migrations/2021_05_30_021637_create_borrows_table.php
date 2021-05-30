<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBorrowsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('borrows', function (Blueprint $table) {
            $table->id('id_peminjaman');
            $table->unsignedBigInteger('id_member')->nullable();
            $table->unsignedBigInteger('id_book')->nullable();
            $table->foreign('id_member')->references('id')->on('users');
            $table->foreign('id_book')->references('id')->on('books');
            $table->date('tanggal_pinjam');
            $table->date('tanggal_kembali');
            $table->string('denda');
            $table->string('status');
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
        Schema::dropIfExists('borrows');
    }
}
