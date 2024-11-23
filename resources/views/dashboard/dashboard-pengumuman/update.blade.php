@extends('dashboard.dashboard')
@section('header-link')
    <link href="https://cdn.jsdelivr.net/npm/quill@2.0.2/dist/quill.snow.css" rel="stylesheet" />
@endsection
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
                        <input type="hidden" name="keterangan" id="keterangan" value="{{ old('keterangan', $pengumuman->keterangan) }}">

                        @error('keterangan')
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
    
        // Memasukkan konten yang sudah ada ke dalam Quill saat halaman pertama kali dimuat
        @if (old('keterangan'))
            quill.root.innerHTML = `{!! old('keterangan') !!}`;
        @elseif ($pengumuman->keterangan)
            quill.root.innerHTML = `{!! $pengumuman->keterangan !!}`;
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
