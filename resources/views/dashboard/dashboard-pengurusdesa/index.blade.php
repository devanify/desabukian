@extends('dashboard.dashboard')
@section('content')
    <div class="container-fluid px-4">
        <h1 class="mt-4">Dashboard</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">PENGURUS DESA</li>
        </ol>

        <button class="btn btn-success mb-3">
            <a href="{{ route('pengurusdesa.create') }}" class="text-white text-decoration-none">TAMBAH DATA</a>
        </button>
        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-table me-1"></i>
                DataTable Example
            </div>
            <div class="card-body">
                <table id="datatablesSimple">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Jabatan</th>
                            <th>No Telephone</th>
                            <th>Status</th>
                            <th>Gambar</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($pengurusdesa as $p)
                            <tr>
                                <td>{{ $p->nama }}</td>
                                <td>{{ $p->jabatan }}</td>
                                <td>{{ $p->telepon }}</td>
                                <td>{{ $p->status }}</td>
                                @if ($p->gambar == null)
                                    <td><img src="{{ asset('assets/image/pengurus_desa/profile.png') }}" height="100px">
                                    </td>
                                @else
                                    <td><img src="{{ asset('assets/image/pengurus_desa/' . $p->gambar) }}" height="100px">
                                    </td>
                                @endif
                                <td>
                                    <a class="btn btn-warning text-white" href="{{ route('pengurusdesa.edit',['id'=>$p->id]) }}">UPDATE</a>
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
