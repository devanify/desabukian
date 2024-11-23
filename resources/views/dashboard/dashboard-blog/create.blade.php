@extends('dashboard.dashboard')
@section('header-link')
    <link href="https://cdn.jsdelivr.net/npm/quill@2.0.2/dist/quill.snow.css" rel="stylesheet" />
@endsection
@section('content')
    <div class="container-fluid px-4">
        <h1 class="mt-4">Dashboard</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Buat Artikel</li>
        </ol>
        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-table me-1"></i>
                Data Artikel
            </div>
            <div class="card-body">
                <form action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="title" class="form-label">Title</label>
                        <input type="text" class="form-control" id="title" name="title" maxlength="255"
                            value="{{ old('title') }}" required>
                        @error('title')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="content" class="form-label">content</label>
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
                        <input type="hidden" name="content" id="content" value="{{ old('content') }}">

                        @error('content')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    {{-- <div class="mb-3">
                        <label for="content" class="form-label">Content</label>
                        <!-- Div yang akan digunakan oleh Quill -->
                        <div id="editor" style="height: 200px;"></div>
                        <input type="hidden" name="content" id="content" value="{{ old('content') }}">
                        @error('content')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div> --}}
                    <div class="mb-3">
                        <label for="image_url" class="form-label">Upload Image</label>
                        <input type="file" class="form-control" id="image_url" name="image_url"
                            value="{{ old('image_url') }}">
                        <p class="mt-1 text-secondary">Ukuran Gambar Maksimal 2MB</p>
                        @error('image_url')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <button type="submit" class="btn btn-primary">Buat Post</button>
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
        @if (old('content'))
            quill.root.innerHTML = {!! json_encode(old('content')) !!};
        @endif

        document.querySelector('form').onsubmit = function() {
            var content = quill.root.innerHTML;

            // Periksa apakah konten kosong atau hanya berisi <p><br></p>
            if (content === "<p><br></p>" || content.trim() === "") {
                content = ""; // Atau null jika Anda ingin menyimpan null
                alert("content tidak boleh kosong!"); // Tambahkan alert untuk memberi tahu pengguna
            }

            // Menyimpan konten ke input hidden
            document.querySelector('#content').value = content;
        };
    </script>
@endsection
