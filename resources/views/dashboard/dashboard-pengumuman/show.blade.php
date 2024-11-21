@extends('dashboard.dashboard')
@section('content')
    <div class="container-fluid px-4">
        <h1 class="mt-4">Dashboard</h1>
        <ol class="breadcrumb mb-3">
            <li class="breadcrumb-item active">Media Pengumuman</li>
        </ol>

        <button class="btn btn-warning mb-3">
            <a href="{{ route('pengumuman.index') }}" class="text-white text-decoration-none">Kembali</a>
        </button>
        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-table me-1"></i>
                Pengumuman
            </div>
            <div class="card-body d-flex justify-content-center">
                @php
                    $extension = pathinfo($file, PATHINFO_EXTENSION);
                @endphp

                {{-- Cek apakah file tersebut gambar --}}
                @if (in_array($extension, ['jpg', 'jpeg', 'png', 'gif', 'svg']))
                    <!-- Jika file adalah gambar -->
                    <img src="{{ asset('assets/image/pengumuman/' . $file) }}" class="img-fluid" alt="Image">
                @elseif($extension === 'pdf')
                    <!-- Jika file adalah PDF -->
                    <iframe src="{{ asset('assets/image/pengumuman/' . $file) }}" width="100%" height="600px"></iframe>
                @endif
            </div>
        </div>
    </div>
    </main>
@endsection
