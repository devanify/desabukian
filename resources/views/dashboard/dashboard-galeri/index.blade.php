@extends('dashboard.dashboard')
@section('content')
<div class="container-fluid px-4">
    <h1 class="mt-4">Dashboard</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Galeri</li>
    </ol>

    <button class="btn btn-success mb-3">
        <a href="{{ route('galeri.create') }}" class="text-white text-decoration-none">TAMBAH DATA</a>
    </button>
    <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-table me-1"></i>
            Galeri Desa Bukian
        </div>
        <div class="card-body">
            <table id="datatablesSimple">
                <thead>
                    <tr>
                        <th>NO</th>
                        <th>Foto</th>
                        <th>Tentang</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($galeri as $g)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td><img src="{{asset('assets/image/galeri/'.$g->image_url) }}" alt="" height="200px"></td>
                        <td>{{ $g->description }}</td> 
                        <td><a class="btn btn-warning text-white" href="{{ route('galeri.edit',['id'=>$g->id]) }}">UPDATE</a></td>
                    </tr>
                    @endforeach
                    
                </tbody>
            </table>
        </div>
    </div>
</div>
</main>
@endsection