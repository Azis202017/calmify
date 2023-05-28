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
        Schema::table('pemesanans', function (Blueprint $table) {
            $table->foreign('id_user')->on('users')->onDelete('cascade')->onUpdate('cascade')->references('id');
            $table->foreign('id_metode_pembayaran')->on('metode_pembayarans')->onDelete('cascade')->onUpdate('cascade')->references('id');

            $table->foreign('id_waktu_sesi')->on('sesi_waktus')->onDelete('cascade')->onUpdate('cascade')->references('id');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('pemesanans', function (Blueprint $table) {
            //
        });
    }
};
