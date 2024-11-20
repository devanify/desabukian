@extends('dashboard.dashboard')
@section('content')
    <div class="container-fluid px-4">
        <h1 class="mt-4">Dashboard</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">UPDATE PENGURUS DESA</li>
        </ol>

        <div class="card mb-4">
            <div class="card-header">
                Perbarui Data Pengurus Desa
            </div>
            <div class="card-body">
                <form action="{{ route('pengurusdesa.update', ['id'=>$pengurus->id]) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-group mb-4">
                        <label for="nama" class="mb-2">Nama</label>
                        <input type="text" class="form-control" placeholder="Enter nama" name="nama"
                            value="{{ old('nama', $pengurus->nama) }}">
                            @error('nama')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group mb-4">
                        <label for="jabatan" class="mb-2">Jabatan</label>
                        <input type="text" class="form-control" placeholder="masukkan jabatan" name="jabatan"
                            value="{{ old('jabatan', $pengurus->jabatan) }}">
                            @error('jabatan')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group mb-4">
                        <label for="telepon" class="mb-2">Telephone</label>
                        <input type="text" class="form-control" placeholder="masukkan no telepon" name="telepon"
                            value="{{ old('telepon', $pengurus->telepon) }}">
                    </div>
                    <div class="form-group mb-4">
                        <label for="status" class="mb-2">Status</label>
                        <select class="form-control" name="status">
                            <option value="aktif" {{ old('status', $pengurus->status) == 'aktif' ? 'selected' : '' }}>Aktif
                            </option>
                            <option value="non-aktif"
                                {{ old('status', $pengurus->status) == 'non-aktif' ? 'selected' : '' }}>Non-Aktif</option>
                        </select>
                        
                    </div>
                    <div class="form-group mb-4">
                        <img src="{{ asset('assets/image/pengurus_desa/'.$pengurus->gambar) }}" height="100px" alt="">
                        <br>
                        <label for="gambar" class="mb-2 mt-1">Gambar</label>
                        <input type="file" class="form-control" placeholder="masukkan gambar" name="gambar" value="{{ old('telepon', $pengurus->telepon) }}" >
                        <p class="mt-1 text-secondary">Ukuran Gambar Maksimal 2MB</p>
                        @error('gambar')
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
