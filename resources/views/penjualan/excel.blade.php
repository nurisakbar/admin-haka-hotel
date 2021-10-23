<table class="table table-bordered">
    <tr>
        <th>No</th>
        <th>Tanggal</th>
        <th>Toko</th>
        <th>Nomor Pesanan</th>
        <th>Nama Pembeli</th>
        <th>Nomor HP</th>
        <th>Uang Masuk</th>
        <th>Ongkir</th>
        <th>Uang Belanja Ke Supplier</th>
        <th>Dana Cair</th>
        <th>Profit</th>
        <th>Komisi 1%</th>
        <th>Profit Perhari</th>
        <th>Akun Belanja</th>
        <th>Status</th>
        <th>Supplier Dari</th>
        <th>Nomor Pesanan</th>
        <th>Nomor Resi Sementara</th>
        <th>Nomor Resi Asli</th>
        <th>Sudah WA Konfirmasi</th>
        <th>Catatan</th>
    </tr>
    @foreach ($penjualan as $row)
    <tr>
        <td>{{ $loop->iteration }}</td>
        <td>{{ $row->tanggal}}</td>
        <td>{{ $row->toko->nama_toko }}</td>
        <td>{{ $row->nomor_pesanan }}</td>
        <td>{{ $row->nama_pembeli }}</td>
        <td>{{ $row->nomor_hp }}</td>
        <td>{{ $row->uang_masuk }}</td>
        <td>{{ $row->ongkir_customer}}</td>
        <td>{{ $row->uang_belanja_ke_supplier}}</td>
        <td>{{ $row->dana_cair}}</td>
        <td>{{ $row->uang_masuk+$row->ongkir_customer-$row->uang_belanja_ke_supplier-(0.01*$row->uang_masuk)}}</td>
        <td>{{0.01*$row->uang_masuk }}</td>
        <td>-</td>
        <td>{{ $row->akun_belanja}}</td>
        <td>{{ $row->status}}</td>
        <td>{{ $row->supplier}}</td>
        <td>{{ $row->nomor_pesanan_beli_ke_supplier}}</td>
        <td>{{ $row->nomor_resi_sementara}}</td>
        <td>{{ $row->nomor_resi_asli}}</td>
        <td>{{ $row->status_wa}}</td>
        <td>{{ $row->catatan}}</td>
    </tr>
    @endforeach
</table>