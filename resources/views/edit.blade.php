@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="card shadow-lg border-0">
        <div class="card-header bg-info text-white">
            <h2 class="text-center mb-0">Update Barang</h2>
        </div>
        <div class="card-body p-4">
            <form action="{{ route('coba.update', $coba->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="kode_barang" class="form-label">Kode Barang</label>
                    <input type="text" name="kode_barang" class="form-control" value="{{ old('kode_barang', $coba->kode_barang) }}" placeholder="Masukkan kode barang" required>
                </div>
                <div class="mb-3">
                    <label for="nama" class="form-label">Nama Barang</label>
                    <input type="text" name="nama" class="form-control" value="{{ old('nama', $coba->nama) }}" placeholder="Masukkan nama barang" required>
                </div>
                <div class="mb-3">
                    <label for="stok" class="form-label">Stok Barang</label>
                    <input type="number" name="stok" class="form-control" value="{{ old('stok', $coba->stok) }}" placeholder="Masukkan jumlah stok" required>
                </div>
                <div class="text-center">
                    <button type="submit" class="btn btn-success px-5">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
