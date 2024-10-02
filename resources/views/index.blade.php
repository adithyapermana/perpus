@extends('layouts.app')

@section('content')
<div class="container-fluid py-5" style="background-color: #f4f6f9;">
    <div class="row justify-content-between mb-4">
        <div class="col-auto">
            @if (Route::has('login'))
                @auth
                    <a href="{{ route('logout') }}" class="btn btn-outline-danger btn-lg shadow-sm" 
                       onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        <i class="bi bi-box-arrow-right"></i> Logout
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                @else
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
            <div class="text-center mb-4">
                <h2 class="fw-bold">Data Barang</h2>
                <a href="{{ route('coba.create') }}" class="btn btn-success btn-lg shadow-sm mb-3" style="border-radius: 50px;">
                    <i class="bi bi-plus-circle me-2"></i>Tambah Barang
                </a>
            </div>
            <div class="row">
                @foreach($cobas as $coba)
                    <div class="col-md-4 mb-4">
                        <div class="card shadow-sm h-100">
                            <div class="card-header text-white text-center" style="background-color: #ff6f61;">
                                <h5 class="mb-0">{{ $coba->nama }}</h5>
                            </div>
                            <div class="card-body text-center">
                                <h6>Kode: {{ $coba->kode_barang }}</h6>
                                <p class="card-text">Stok: {{ $coba->stok }}</p>
                                <div class="d-flex justify-content-center">
                                    <a href="{{ route('coba.edit', $coba->id) }}" class="btn btn-warning btn-sm me-2" style="border-radius: 50px;">
                                        <i class="bi bi-pencil-fill"></i> Edit
                                    </a>
                                    <form action="{{ route('coba.destroy', $coba->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus barang ini?')" style="display:inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm shadow-sm delete-btn" style="border-radius: 50px;">
                                            <i class="bi bi-trash-fill"></i> Hapus
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
    document.querySelectorAll('.delete-btn').forEach(function(button) {
        button.addEventListener('click', function(e) {
            e.target.classList.add('btn-deleting');
        });
    });
</script>

<style>
    body {
        background-color: #f4f6f9;
        font-family: 'Poppins', sans-serif;
    }

    .card {
        border: none;
        border-radius: 15px;
        transition: transform 0.3s;
    }

    .card:hover {
        transform: translateY(-5px);
        box-shadow: 0 6px 20px rgba(0, 0, 0, 0.2);
    }

    .btn {
        transition: all 0.3s ease;
    }

    .btn:hover {
        box-shadow: 0 6px 15px rgba(0, 0, 0, 0.2);
        transform: translateY(-3px);
    }

    .btn-deleting {
        background-color: #dc3545 !important;
        opacity: 0.6;
        pointer-events: none;
        transition: opacity 0.2s ease;
    }

    /* Styling untuk tombol dan kartu */
    .btn-success {
        background-color: #28a745; /* Hijau */
        border: none;
        border-radius: 50px;
    }

    .btn-success:hover {
        background-color: #218838; /* Hijau lebih gelap */
    }

    .btn-warning {
        background-color: #ffc107; /* Kuning */
        border-radius: 50px;
        border: none;
    }

    .btn-warning:hover {
        background-color: #e0a800; /* Kuning lebih gelap */
    }

    .btn-danger {
        background-color: #dc3545; /* Merah */
        border-radius: 50px;
        border: none;
    }

    .btn-danger:hover {
        background-color: #c82333; /* Merah lebih gelap */
    }
</style>
@endsection
