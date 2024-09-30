@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="card shadow-lg border-0">
        <div class="card-header bg-primary text-white">
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
                    <button type="submit" class="btn btn-success px-5">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
