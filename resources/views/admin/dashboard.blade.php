@extends('layouts.admin.app')

@section('content')
@php
    // Data contoh sesuai prototipe proposal (nanti diganti data dari database)
    $kartu = [
        ['label' => 'Total Kamar',        'nilai' => '14',          'tone' => 'primary',
         'path'  => 'M4 4a2 2 0 012-2h8a2 2 0 012 2v12a1 1 0 110 2h-3a1 1 0 01-1-1v-2a1 1 0 00-1-1H9a1 1 0 00-1 1v2a1 1 0 01-1 1H4a1 1 0 110-2V4zm3 1h2v2H7V5zm2 4H7v2h2V9zm2-4h2v2h-2V5zm2 4h-2v2h2V9z'],
        ['label' => 'Kamar Kosong',       'nilai' => '0',           'tone' => 'success',
         'path'  => 'M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z'],
        ['label' => 'Menunggu Validasi',  'nilai' => '1',           'tone' => 'warning',
         'path'  => 'M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z'],
        ['label' => 'Total Pendapatan',   'nilai' => 'Rp 249.000',  'tone' => 'info',
         'path'  => 'M4 4a2 2 0 00-2 2v1h16V6a2 2 0 00-2-2H4zM18 9H2v5a2 2 0 002 2h12a2 2 0 002-2V9zM4 13a1 1 0 011-1h1a1 1 0 110 2H5a1 1 0 01-1-1zm5-1a1 1 0 100 2h1a1 1 0 100-2H9z'],
    ];

    $reservasi = [
        ['id' => 1, 'tamu' => 'Andi Pratama', 'tipe' => 'Standard', 'tanggal' => '20 Mei - 21 Mei 2025', 'status' => 'Menunggu'],
        ['id' => 2, 'tamu' => 'Budi Santoso', 'tipe' => 'Deluxe',   'tanggal' => '19 Jan - 23 Jan 2025', 'status' => 'Disetujui'],
        ['id' => 3, 'tamu' => 'Budi Santoso', 'tipe' => 'Standard', 'tanggal' => '12 Des - 13 Des 2024', 'status' => 'Disetujui'],
        ['id' => 4, 'tamu' => 'Siti Rahma',   'tipe' => 'VIP',      'tanggal' => '08 Nov - 10 Nov 2024', 'status' => 'Disetujui'],
        ['id' => 5, 'tamu' => 'Siti Rahma',   'tipe' => 'Standard', 'tanggal' => '19 Okt - 21 Okt 2024', 'status' => 'Ditolak'],
    ];

    $warna = ['Menunggu' => 'bg-warning text-dark', 'Disetujui' => 'bg-success', 'Ditolak' => 'bg-danger'];
@endphp

<style>
    .btn-primary { background-color: #0b8a9a; border-color: #0b8a9a; }
    .btn-primary:hover { background-color: #0a6f7d; border-color: #0a6f7d; }
</style>

<div class="py-4">
    <h1 class="h4 mb-1">Dashboard Admin</h1>
    <p class="mb-0">Kelola kamar dan periksa bukti pembayaran reservasi.</p>
</div>

<div class="row g-4">
    @foreach ($kartu as $k)
        <div class="col-12 col-sm-6 col-xl-3">
            <div class="card border-0 shadow h-100">
                <div class="card-body d-flex align-items-center">
                    <div class="icon-shape icon-shape-{{ $k['tone'] }} rounded me-3 d-flex align-items-center justify-content-center flex-shrink-0"
                         style="width:48px;height:48px">
                        <svg class="icon icon-sm" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" clip-rule="evenodd" d="{{ $k['path'] }}"></path>
                        </svg>
                    </div>
                    <div>
                        <div class="small fw-bold text-uppercase text-gray-500">{{ $k['label'] }}</div>
                        <div class="h3 fw-bolder mb-0">{{ $k['nilai'] }}</div>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
</div>

<div class="card border-0 shadow mt-4">
    <div class="card-header">
        <h2 class="h5 mb-0">Tabel Validasi Reservasi</h2>
    </div>
    <div class="table-responsive">
        <table class="table table-hover align-items-center mb-0">
            <thead class="thead-light">
                <tr>
                    <th class="border-0">ID</th>
                    <th class="border-0">Nama Tamu</th>
                    <th class="border-0">Tipe Kamar</th>
                    <th class="border-0">Tanggal</th>
                    <th class="border-0">Status</th>
                    <th class="border-0 text-end">Validasi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($reservasi as $r)
                    <tr>
                        <td class="fw-bold">{{ $r['id'] }}</td>
                        <td>{{ $r['tamu'] }}</td>
                        <td>{{ $r['tipe'] }}</td>
                        <td class="text-nowrap">{{ $r['tanggal'] }}</td>
                        <td><span class="badge {{ $warna[$r['status']] }}">{{ $r['status'] }}</span></td>
                        <td class="text-end text-nowrap">
                            <button type="button" class="btn btn-sm btn-primary">Setujui</button>
                            <button type="button" class="btn btn-sm btn-outline-danger">Tolak</button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="card-footer small text-gray-600">
        Periksa bukti transfer sebelum menyetujui reservasi. Keputusan tampil pada riwayat pelanggan.
    </div>
</div>
@endsection
