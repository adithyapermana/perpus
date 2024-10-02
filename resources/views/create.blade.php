@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="card shadow-lg border-0 rounded-3">
        <div class="card-header text-white" style="background: linear-gradient(135deg, #ff6a00, #ee0979);">
            <h2 class="text-center mb-0">Tambah Barang</h2>
        </div>
        <div class="card-body p-4">
            <form action="{{ route('coba.store') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="kode_barang" class="form-label">Kode Barang</label>
                    <input type="text" name="kode_barang" class="form-control" placeholder="Masukkan kode barang" required>
                </div>
                <div class="mb-3">
                    <label for="nama" class="form-label">Nama Barang</label>
                    <input type="text" name="nama" class="form-control" placeholder="Masukkan nama barang" required>
                </div>
                <div class="mb-3">
                    <label for="stok" class="form-label">Stok Barang</label>
                    <input type="number" name="stok" class="form-control" placeholder="Masukkan jumlah stok" required>
                </div>
                <div class="text-center">
                    <button type="submit" class="btn btn-warning px-5">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@section('styles')
<style>
    body {
        background-color: #e9ecef; /* Warna latar belakang yang lebih cerah */
        font-family: 'Poppins', sans-serif;
    }

    .card {
        border-radius: 15px;
        box-shadow: 0 8px 30px rgba(0, 0, 0, 0.15); /* Bayangan yang lebih besar */
    }

    .card-header {
        border-top-left-radius: 15px;
        border-top-right-radius: 15px;
        text-align: center;
    }

    .form-label {
        font-weight: 600; /* Menebalkan label */
        color: #333; /* Warna label yang lebih gelap */
    }

    .form-control {
        border-radius: 10px;
        transition: box-shadow 0.3s ease, border-color 0.3s ease;
    }

    .form-control:focus {
        box-shadow: 0 0 8px rgba(255, 105, 180, 0.5); /* Efek fokus yang lebih lembut */
        border-color: #ff6a00; /* Warna border saat fokus */
    }

    .btn-warning {
        border-radius: 25px;
        background-color: #ffc107;
        border: none;
        font-weight: bold; /* Menebalkan teks tombol */
    }

    .btn-warning:hover {
        background-color: #e0a800; /* Warna hover yang lebih gelap */
    }

    /* Responsivitas untuk tampilan lebih baik di perangkat kecil */
    @media (max-width: 576px) {
        .card {
            margin: 0 15px; /* Memberikan margin di perangkat kecil */
        }
    }
</style>
@endsection
