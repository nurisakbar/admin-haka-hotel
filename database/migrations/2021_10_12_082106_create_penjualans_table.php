<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePenjualansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('penjualan', function (Blueprint $table) {
            $table->id();
            $table->integer('toko_id');
            $table->integer('user_id');
            $table->date('tanggal');
            $table->string('nomor_pesanan');
            $table->string('nama_pembeli');
            $table->string('nomor_hp');
            $table->integer('uang_masuk');
            $table->integer('ongkir_customer');
            $table->string('akun_belanja');
            $table->string('supplier'); // tokopedia/ bukalapak/ shopee
            $table->string('nomor_pesanan_beli_ke_supplier')->nullable();
            $table->string('nomor_resi_sementara')->nullable();
            $table->string('nomor_resi_asli')->nullable();
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
        Schema::dropIfExists('penjualans');
    }
}
