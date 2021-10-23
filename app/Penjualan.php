<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Penjualan extends Model
{
    protected $table="penjualan";

    protected $fillable = [
        'toko_id',
        'user_id',
        'tanggal',
        'nomor_pesanan',
        'nama_pembeli',
        'supplier',
        'ongkir_customer',
        'ongkir_supplier',
        'akun_belanja',
        'uang_masuk',
        'nomor_hp',
        'status',
        'nomor_pesanan_beli_ke_supplier',
        'nomor_resi_sementara',
        'nomor_resi_asli',
        'status_wa',
        'catatan',
        'dana_cair',
        'uang_belanja_ke_supplier'
    ];


    public function toko()
    {
        return $this->belongsTo(\App\Toko::class);
    }
}
