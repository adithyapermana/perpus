@extends('layouts.app')

@section('content')
<div class="container d-flex justify-content-center align-items-center" style="min-height: 100vh; background: linear-gradient(135deg, #ff7e5f, #feb47b);">
    <div class="col-md-6">
        <div class="card shadow-lg border-0" style="border-radius: 20px;">
            <div class="card-header text-center bg-white" style="border-top-left-radius: 20px; border-top-right-radius: 20px;">
                <h4 class="mb-0" style="font-weight: 700; color: #333;">Buat Akun Baru</h4>
            </div>
            <div class="card-body">
                <form action="{{ route('register.submit') }}" method="POST">
                    @csrf
                    <!-- Nama input -->
                    <div class="mb-3">
                        <label for="name" class="form-label">Nama:</label>
                        <div class="input-group">
                            <span class="input-group-text bg-white border-end-0" id="basic-addon1">
                                <i class="fas fa-user"></i>
                            </span>
                            <input type="text" name="name" class="form-control border-start-0" required placeholder="Masukkan nama Anda">
                        </div>
                    </div>

                    <!-- Email input -->
                    <div class="mb-3">
                        <label for="email" class="form-label">Email:</label>
                        <div class="input-group">
                            <span class="input-group-text bg-white border-end-0" id="basic-addon2">
                                <i class="fas fa-envelope"></i>
                            </span>
                            <input type="email" name="email" class="form-control border-start-0" required placeholder="Masukkan email Anda">
                        </div>
                    </div>

                    <!-- Password input -->
                    <div class="mb-3">
                        <label for="password" class="form-label">Password:</label>
                        <div class="input-group">
                            <span class="input-group-text bg-white border-end-0" id="basic-addon3">
                                <i class="fas fa-lock"></i>
                            </span>
                            <input type="password" name="password" class="form-control border-start-0" required placeholder="Buat password Anda">
                        </div>
                    </div>

                    <!-- Konfirmasi Password input -->
                    <div class="mb-3">
                        <label for="password_confirmation" class="form-label">Konfirmasi Password:</label>
                        <div class="input-group">
                            <span class="input-group-text bg-white border-end-0" id="basic-addon4">
                                <i class="fas fa-lock"></i>
                            </span>
                            <input type="password" name="password_confirmation" class="form-control border-start-0" required placeholder="Ulangi password Anda">
                        </div>
                    </div>

                    <!-- Submit button -->
                    <button type="submit" class="btn w-100 text-white" style="background: linear-gradient(45deg, #ff7e5f, #feb47b); border-radius: 30px; font-weight: 600;">
                        Registrasi
                    </button>
                </form>
            </div>
            <div class="card-footer text-center bg-white" style="border-bottom-left-radius: 20px; border-bottom-right-radius: 20px;">
                <p>Sudah punya akun? <a href="{{ route('login') }}" style="color: #ff7e5f; text-decoration: none; font-weight: 600;">Masuk di sini</a></p>
            </div>
        </div>
    </div>
</div>
@endsection
