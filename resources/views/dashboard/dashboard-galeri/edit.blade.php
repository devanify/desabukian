@extends('dashboard.dashboard')
@section('header-link')
    <link href="https://cdn.jsdelivr.net/npm/quill@2.0.2/dist/quill.snow.css" rel="stylesheet" />
@endsection
@section('content')
    <div class="container-fluid px-4">
        <h1 class="mt-4">Dashboard</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Galeri</li>
        </ol>
        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-table me-1"></i>
                Perbarui Data Gambar
            </div>
            <div class="card-body">
                <form action="{{ route('galeri.update',['id'=>$galeri->id]) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label for="description" class="form-label">Keterangan</label>
                        <input type="text" class="form-control" id="title" name="description" maxlength="255" value="{{ old('description' , $galeri->description) }}">
                        @error('description')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="image_url" class="form-label">Upload Image</label>
                        <br>
                        <img src="{{ asset('assets/image/galeri/' . $galeri->image_url) }}" alt="" class="mb-4" height="200px">
                        <input type="file" class="form-control" id="image_url" name="image_url" accept="image/*" value="{{ old('image_url' ,  $galeri->image_url) }}">
                        <p class="mt-1 text-secondary">Ukuran Gambar Maksimal 2MB</p>
                        @error('image_url')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <button type="submit" class="btn btn-primary">Simpan Gambar</button>
                </form>

            </div>
        </div>
    </div>
    </main>
@endsection