@extends('dashboard.dashboard')
@section('header-link')
    <link href="https://cdn.jsdelivr.net/npm/quill@2.0.2/dist/quill.snow.css" rel="stylesheet" />
@endsection
@section('content')
    <div class="container-fluid px-4">
        <h1 class="mt-4">Dashboard</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">TAMBAH PENGUMUMAN</li>
        </ol>

        <div class="card mb-4">
            <div class="card-header">
                Data Pengumuman Desa
            </div>
            <div class="card-body">
                <form action="{{ route('pengumuman.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group mb-4">
                        <label for="judul" class="mb-2">Judul Pengumuman</label>
                        <input type="text" class="form-control" placeholder="masukkan judul pengumuman" name="judul"
                            value="{{ old('judul') }}">
                        @error('judul')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="keterangan" class="form-label">Keterangan</label>
                        <!-- Toolbar Quill Kustom -->
                        <div id="toolbar">
                            <span class="ql-formats">
                                <select class="ql-header">
                                    <option value="1">Heading 1</option>
                                    <option value="2">Heading 2</option>
                                    <option selected>Normal</option>
                                </select>
                            </span>
                            <span class="ql-formats">
                                <button class="ql-bold"></button> <!-- Tombol Bold -->
                            </span>
                            <span class="ql-formats">
                                <button class="ql-list" value="ordered"></button> <!-- Ordered List -->
                                <button class="ql-list" value="bullet"></button> <!-- Bullet List -->
                            </span>
                        </div>

                        <!-- Editor Quill -->
                        <div id="editor" style="height: 200px;"></div>

                        <!-- Hidden input untuk menyimpan konten editor -->
                        <input type="hidden" name="keterangan" id="keterangan" value="{{ old('keterangan') }}">

                        @error('keterangan')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group mb-4">
                        <label for="tanggal_publikasi" class="mb-2">Tanggal Publikasi</label>
                        <input type="date" class="form-control" name="tanggal_publikasi"
                            value="{{ old('tanggal_publikasi') }}">
                    </div>
                    <div class="form-group mb-4">
                        <label for="media" class="mb-2">File Pengumuman</label>
                        <input type="file" class="form-control" placeholder="masukkan file" name="media"
                            value="{{ old('media') }}">
                        <p class="mt-1 text-secondary">File Berupa Gambar/PDF dan Ukuran Maksimal 2MB</p>
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
@section('script')
    <!-- Include the Quill library -->
    <script src="https://cdn.jsdelivr.net/npm/quill@2.0.2/dist/quill.js"></script>
    <!-- Initialize Quill editor -->
    <script>
        const quill = new Quill('#editor', {
            theme: 'snow',
            modules: {
                toolbar: '#toolbar' // Menggunakan toolbar kustom
            }
        });

        // Mengisi konten lama (jika ada) ke editor Quill setelah halaman dimuat
        @if (old('keterangan'))
            quill.root.innerHTML = {!! json_encode(old('keterangan')) !!};
        @endif

        document.querySelector('form').onsubmit = function() {
            var content = quill.root.innerHTML;

            // Periksa apakah konten kosong atau hanya berisi <p><br></p>
            if (content === "<p><br></p>" || content.trim() === "") {
                content = ""; // Atau null jika Anda ingin menyimpan null
                alert("Keterangan tidak boleh kosong!"); // Tambahkan alert untuk memberi tahu pengguna
            }

            // Menyimpan konten ke input hidden
            document.querySelector('#keterangan').value = content;
        };
    </script>
@endsection
