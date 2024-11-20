@extends('dashboard.dashboard')
@section('header-link')
    <link href="https://cdn.jsdelivr.net/npm/quill@2.0.2/dist/quill.snow.css" rel="stylesheet" />
@endsection
@section('content')
    <div class="container-fluid px-4">
        <h1 class="mt-4">Dashboard</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Infografis</li>
        </ol>
        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-table me-1"></i>
                Data Infografis
            </div>
            <div class="card-body">
                <form action="{{ route('infografis.store') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="description" class="form-label">Tahun</label>
                        <input type="number" class="form-control" id="tahun" name="tahun" maxlength="255"
                            value="{{ old('tahun') }}" required>
                        @error('tahun')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="description" class="form-label">Jumlah Penduduk</label>
                        <input type="number" class="form-control" id="jumlah_penduduk" name="jumlah_penduduk"
                            maxlength="255" value="{{ old('jumlah_penduduk') }}" required>
                        @error('jumlah_penduduk')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="description" class="form-label">Jumlah KK</label>
                        <input type="number" class="form-control" id="jumlah_kk" name="jumlah_kk" maxlength="255"
                            value="{{ old('jumlah_kk') }}" required>
                        @error('jumlah_kk')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="description" class="form-label">Jumlah Pria</label>
                        <input type="number" class="form-control" id="jumlah_kk" name="jumlah_pria" maxlength="255"
                            value="{{ old('jumlah_pria') }}" required>
                        @error('jumlah_pria')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="description" class="form-label">Jumlah Perempuan</label>
                        <input type="number" class="form-control" id="jumlah_perempuan" name="jumlah_perempuan"
                            maxlength="255" value="{{ old('jumlah_perempuan') }}" required>
                        @error('jumlah_perempuan')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>


                    <button type="submit" class="btn btn-primary">Simpan Data</button>
                </form>

            </div>
        </div>
    </div>
    </main>
@endsection
