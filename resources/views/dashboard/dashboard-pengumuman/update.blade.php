@extends('dashboard.dashboard')
@section('content')
    <div class="container-fluid px-4">
        <h1 class="mt-4">Dashboard</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">PERBARUI PENGUMUMAN</li>
        </ol>

        <div class="card mb-4">
            <div class="card-header">
                Data Pengumuman Desa
            </div>
            <div class="card-body">
                <form action="{{ route('pengumuman.update',["id"=>$pengumuman->id]) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method("PUT")
                    <div class="form-group mb-4">
                        <label for="judul" class="mb-2">Judul Pengumuman</label>
                        <input type="text" class="form-control" placeholder="masukkan judul pengumuman" name="judul"
                            value="{{ old('judul', $pengumuman->judul) }}">
                        @error('judul')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group mb-4">
                        <label for="tanggal_publikasi" class="mb-2">Tanggal Publikasi</label>
                        <input type="date" class="form-control" name="tanggal_publikasi"
                            value="{{ old('tanggal_publikasi', \Carbon\Carbon::parse($pengumuman->tanggal_publikasi)->format('Y-m-d')) }}">

                    </div>
                    <div class="form-group mb-4">
                        <label for="media" class="mb-2">File Pengumuman</label>
                        @php
                            $extension = pathinfo($pengumuman->media, PATHINFO_EXTENSION);
                        @endphp
                    
                        @if ($extension === 'pdf')
                            <!-- Tampilkan PDF menggunakan iframe -->
                            <iframe src="{{ asset('assets/image/pengumuman/' . $pengumuman->media) }}"
                                style="width: 100%; height: 500px; border: none;">
                            </iframe>
                        @else
                            <br>
                            <img src="{{ asset('assets/image/pengumuman/' . $pengumuman->media) }}" 
                                alt="{{ $pengumuman->judul }}" class="mb-3 img-fluid">
                        @endif
                    
                        <input type="file" class="form-control" placeholder="Masukkan file baru" name="media">
                        <p class="mt-1 text-secondary">File berupa gambar (JPEG, PNG, JPG) atau PDF dengan ukuran maksimal 2MB.</p>
                        @error('media')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <button class="btn btn-primary mt-2" type="submit">Simpan</button>
                </form>
            </div>
        </div>
    </div>
    </main>
@endsection
