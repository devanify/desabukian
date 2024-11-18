@extends('dashboard.dashboard')
@section('header-link')
    <link href="https://cdn.jsdelivr.net/npm/quill@2.0.2/dist/quill.snow.css" rel="stylesheet" />
@endsection
@section('content')
    <div class="container-fluid px-4">
        <h1 class="mt-4">Dashboard</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Buat Post</li>
        </ol>
        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-table me-1"></i>
                D
            </div>
            <div class="card-body">
                <form action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="title" class="form-label">Title</label>
                        <input type="text" class="form-control" id="title" name="title" maxlength="255" value="{{ old('title') }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="content" class="form-label">Content</label>
                        <!-- Div yang akan digunakan oleh Quill -->
                        <div id="editor" style="height: 200px;"></div>
                        <input type="hidden" name="content" id="content" value="{{ old('content') }}">
                    </div>
                    <div class="mb-3">
                        <label for="image_url" class="form-label">Upload Image</label>
                        <input type="file" class="form-control" id="image_url" name="image_url" accept="image/*" value="{{ old('image_url') }}">
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
            theme: 'snow'
        });
        // Menyimpan konten ke input hidden saat formulir disubmit
        document.querySelector('form').onsubmit = function() {
            var content = quill.root.innerHTML;
            document.querySelector('#content').value = content; // Menyimpan konten editor ke input hidden
        };
    </script>
@endsection
