@extends('dashboard.dashboard')
@section('content')
    <div class="container-fluid px-4">
        <h1 class="mt-4">Dashboard</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">INFOGRAFIS PENDUDUK DESA</li>
        </ol>

        <button class="btn btn-success mb-3">
            <a href="{{ route('infografis.create') }}" class="text-white text-decoration-none">TAMBAH DATA</a>
        </button>
        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-table me-1"></i>
                DataTable Infografis
            </div>
            <div class="card-body">
                <table id="datatablesSimple">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Tahun</th>
                            <th>Jumlah Penduduk</th>
                            <th>Jumlah KK</th>
                            <th>Jumlah Pria</th>
                            <th>Jumlah Perempuan</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($infografis as $i)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $i->tahun }}</td>
                                <td>{{ $i->jumlah_penduduk }}</td>
                                <td>{{ $i->jumlah_kk }}</td>
                                <td>{{ $i->jumlah_pria }}</td>
                                <td>{{ $i->jumlah_perempuan }}</td>
                                <td>
                                    <a class="btn btn-warning" href="{{ route('infografis.edit',['id'=>$i->id]) }}">UPDATE</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    </main>
@endsection
