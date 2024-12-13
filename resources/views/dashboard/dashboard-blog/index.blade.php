@extends('dashboard.dashboard')
@section('content')
<div class="container-fluid px-4">
    <h1 class="mt-4">Dashboard</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Artikel</li>
    </ol>

    <button class="btn btn-success mb-3">
        <a href="{{ route('posts.create') }}" class="text-white text-decoration-none">TAMBAH DATA</a>
    </button>
    <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-table me-1"></i>
            DataTable Artikel
        </div>
        <div class="card-body">
            <table id="datatablesSimple">
                <thead>
                    <tr>
                        <th class="col-2">NO</th>
                        <th style="width: 30%;">Judul</th>
                        <th>Foto</th>
                        <th>Content</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($posts as $p)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td style="width: 30%;">{{ $p->title }}</td>
                        <td>
                            <img src="{{asset('assets/image/posts/'.$p->image_url) }}" alt="" height="100px"></td>
                        <td> {{ substr(strip_tags($p->content), 0, 100) }}...</td>
                        <td>
                            <a class="btn btn-warning text-white mb-1 mr-1" href="{{ route('posts.edit',['id'=>$p->id]) }}">UPDATE</a>
                            <form action="{{ route('posts.destroy', $p->id) }}" method="POST"
                                style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger text-uppercase delete"
                                    data-name="{{ $p->title }}" data-toggle="tooltip"
                                    data-original-title="Delete">
                                    Delete
                                </button>
                            </form></td>
                    </tr>
                    @endforeach
                    
                </tbody>
            </table>
        </div>
    </div>
</div>
</main>
@endsection