@extends('dashboard.dashboard')
@section('content')
    <div class="container-fluid px-4">
        <h1 class="mt-4">Dashboard</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Perbarui Profile</li>
        </ol>

        <div class="card mb-4">
            <div class="card-header">
                User Profile
            </div>
            <div class="card-body">
                <form action="{{ route('user.update') }}" method="POST" enctype="multipart/form-data">
                   @csrf
                    <div class="form-group mb-4">
                        <label for="Email" class="mb-2">Email</label>
                        <input type="email" class="form-control" disabled name="email"
                            value="{{ $user->email }}">
                    </div>
                    <div class="form-group mb-4">
                        <label for="name" class="mb-2">Nama</label>
                        <input type="text" class="form-control"  name="name"
                            value="{{ old('name') ?? $user->name }}">
                            @error('name')
                            <div class="text-danger mt-1">{{ $message }}</div>
                        @enderror
                    </div>
                    <h4 class="my-2">Perbarui Password</h4>
                    <p class="text-secondary">Silahkan masukkan password apabila ingin mengganti password</p>
                    <div class="form-group mb-4">
                        <label for="password" class="mb-2">Password</label>
                        <input type="password" class="form-control"  name="password"
                            value="">
                            @error('password')
                            <div class="text-danger mt-1">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group mb-4">
                        <label for="confirm_password" class="mb-2">Konfirmasi Password</label>
                        <input type="password" class="form-control"  name="confirm_password"
                            value="">
                            @error('confirm_password')
                            <div class="text-danger mt-1">{{ $message }}</div>
                        @enderror
                    </div>
                    
                    <button class="btn btn-primary mt-2" type="submit">Simpan</button>
                </form>
            </div>
        </div>

    </div>
    </main>
@endsection
