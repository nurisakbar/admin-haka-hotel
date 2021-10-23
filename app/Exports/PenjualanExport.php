<?php

namespace App\Exports;

use App\Penjualan;
use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class PenjualanExport implements FromView, ShouldAutoSize
{
    public $periode_awal;
    public $periode_akhir;

    public function __construct($periode_awal, $periode_akhir)
    {
        $this->periode_awal = $periode_awal;
        $this->periode_akhir = $periode_akhir;
    }
    /**
    * @return \Illuminate\Support\Collection
    */
    public function view(): View
    {
        return view('penjualan.excel', [
            'penjualan' => Penjualan::whereBetween('tanggal', [$this->periode_awal,$this->periode_akhir])->get()
        ]);
    }
}
