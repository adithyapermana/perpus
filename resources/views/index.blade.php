@extends('layouts.app')

@section('content')
<div class="container-fluid py-5" style="background-color: #f0f2f5;">
    <div class="row justify-content-between mb-4">
        <div class="col-auto">
            {{-- Pastikan rute untuk login dan register sudah disiapkan dengan benar --}}
            @if (Route::has('login'))
                @auth
                    {{-- Jika sudah login, tampilkan tombol logout --}}
                    <a href="{{ route('logout') }}" class="btn btn-outline-danger btn-lg shadow-sm" 
                       onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        <i class="bi bi-box-arrow-right"></i> Logout
                    </a>

                    {{-- Formulir logout yang akan dipanggil saat tombol logout diklik --}}
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                @else
                    {{-- Jika belum login, tampilkan tombol login dan registrasi --}}
                    <a href="{{ route('login') }}" class="btn btn-outline-primary btn-lg shadow-sm me-2">
                        <i class="bi bi-box-arrow-in-right"></i> Login
                    </a>

                    @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="btn btn-outline-success btn-lg shadow-sm">
                            <i class="bi bi-person-plus"></i> Registrasi
                        </a>
                    @endif
                @endauth
            @endif
        </div>
    </div>

    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card shadow-lg">
                <div class="card-header bg-primary text-white text-center py-4">
                    <h2 class="mb-0 fw-bold">Data Barang</h2>
                </div>
                <div class="card-body">
                    <div class="d-flex justify-content-between mb-4">
                        <a href="{{ route('coba.create') }}" class="btn btn-success btn-lg shadow-sm">
                            <i class="bi bi-plus-circle me-2"></i>Tambah Barang
                        </a>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-striped table-hover align-middle text-center">
                            <thead class="table-primary">
                                <tr>
                                    <th scope="col">Kode Barang</th>
                                    <th scope="col">Nama</th>
                                    <th scope="col">Stok</th>
                                    <th scope="col">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($cobas as $coba)
                                    <tr>
                                        <td>{{ $coba->kode_barang }}</td>
                                        <td>{{ $coba->nama }}</td>
                                        <td>{{ $coba->stok }}</td>
                                        <td>
                                            <div class="d-flex justify-content-center">
                                                <a href="{{ route('coba.edit', $coba->id) }}" class="btn btn-warning btn-sm me-2 shadow-sm">
                                                    <i class="bi bi-pencil-fill"></i> Edit
                                                </a>
                                                <form action="{{ route('coba.destroy', $coba->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus barang ini?')" style="display:inline">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm shadow-sm delete-btn">
                                                        <i class="bi bi-trash-fill"></i> Hapus
                                                    </button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
    // Tambahkan efek saat klik tombol hapus
    document.querySelectorAll('.delete-btn').forEach(function(button) {
        button.addEventListener('click', function(e) {
            e.target.classList.add('btn-deleting');
        });
    });
</script>

<style>
    body {
        background-color: #e9ecef;
    }

    .card {
        border: none;
        border-radius: 10px;
    }

    .card-header {
        border-top-left-radius: 10px;
        border-top-right-radius: 10px;
        background-color: #007bff;
        box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
    }

    .table-hover tbody tr:hover {
        background-color: #f1f3f5;
        transition: background-color 0.3s ease-in-out;
    }

    .btn {
        transition: box-shadow 0.3s ease, transform 0.3s ease;
    }

    .btn:hover {
        box-shadow: 0px 4px 15px rgba(0, 0, 0, 0.2);
        transform: translateY(-2px);
    }

    .btn-deleting {
        background-color: #dc3545 !important;
        opacity: 0.6;
        pointer-events: none;
    }

    .delete-btn:hover {
        transform: scale(1.05);
        transition: transform 0.3s ease-in-out;
    }

    .table-striped tbody tr:nth-of-type(odd) {
        background-color: #f8f9fa;
    }

    .table-striped tbody tr:nth-of-type(even) {
        background-color: #ffffff;
    }

    .table-primary {
        background-color: #007bff;
        color: white;
    }

    .btn-success {
        background-color: #28a745;
        border: none;
    }

    .btn-success:hover {
        background-color: #218838;
    }

    .btn-outline-primary:hover {
        background-color: #007bff;
        color: #fff;
    }

    .btn-outline-success:hover {
        background-color: #28a745;
        color: #fff;
    }
</style>
@endsection
