@extends('dashboard.dashboard')
@section('content')
    <div class="container-fluid px-4">
        <h1 class="mt-4">Dashboard</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">TAMBAH PENGURUS DESA</li>
        </ol>

        <div class="card mb-4">
            <div class="card-header">
                Data Pengurus Desa
            </div>
            <div class="card-body">
                <form action="{{ route('pengurusdesa.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group mb-4">
                        <label for="nama" class="mb-2">Nama</label>
                        <input type="text" class="form-control" placeholder="Enter nama" name="nama">
                    </div>
                    <div class="form-group mb-4">
                        <label for="jabatan" class="mb-2">Jabatan</label>
                        <input type="text" class="form-control" placeholder="masukkan jabatan" name="jabatan">
                    </div>
                    <div class="form-group mb-4">
                        <label for="telepon" class="mb-2">Telephone</label>
                        <input type="text" class="form-control" placeholder="masukkan no telepon" name="telepon">
                    </div>
                    <div class="form-group mb-4">
                        <label for="gambar" class="mb-2">Gambar</label>
                        <input type="file" class="form-control" placeholder="masukkan gambar" name="gambar">
                    </div>
                    <button class="btn btn-primary mt-2" type="submit">Simpan</button>
                </form>
            </div>
        </div>
    </div>
    </main>
@endsection
