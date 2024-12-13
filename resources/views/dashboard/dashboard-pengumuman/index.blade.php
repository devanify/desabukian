@extends('dashboard.dashboard')
@section('content')
<div class="container-fluid px-4">
    <h1 class="mt-4">Dashboard</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Pengumuman</li>
    </ol>

    <button class="btn btn-success mb-3">
        <a href="{{ route('pengumuman.create') }}" class="text-white text-decoration-none">TAMBAH DATA</a>
    </button>
    <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-table me-1"></i>
            DataTable Pengumuman
        </div>
        <div class="card-body">
            <table id="datatablesSimple">
                <thead>
                    <tr>
                        <th class="col-2">NO</th>
                        <th>Tanggal Publikasi</th>
                        <th>Judul</th>
                        <th>File</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($pengumuman as $p )
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ \Carbon\Carbon::parse($p->tanggal_publikasi)->format('d-m-Y') }}</td>
                        <td>{{ $p->judul}}</td>
                        <td>
                            @php
                                $extension = pathinfo($p->media, PATHINFO_EXTENSION);
                            @endphp
                        
                            {{-- Cek apakah file tersebut gambar --}}
                            @if(in_array($extension, ['jpg', 'jpeg', 'png', 'gif', 'svg']))
                                <!-- Jika file adalah gambar -->
                                <button onclick="window.location.href='{{ route('pengumuman.show', ['file' => $p->media]) }}'" class="btn btn-primary mx-1">
                                    Lihat Gambar
                                </button>
                            @elseif($extension === 'pdf')
                                <!-- Jika file adalah PDF -->
                                <button onclick="window.location.href='{{ route('pengumuman.show', ['file' => $p->media]) }}'" class="btn btn-success my-1">
                                    Buka PDF
                                </button>
                            @endif
                        </td>
                        <td>
                            <a class="btn btn-warning text-white " href="{{ route('pengumuman.edit',['id'=>$p->id]) }}">Update</a>
                            <form action="{{ route('pengumuman.destroy', $p->id) }}" method="POST"
                                style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger text-uppercase delete"
                                    data-name="{{ $p->judul }}" data-toggle="tooltip"
                                    data-original-title="Delete">
                                    Delete
                                </button>
                            </form>
                        </td>
                    @endforeach
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
</main>
@endsection