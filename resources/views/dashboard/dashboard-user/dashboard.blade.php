@extends('dashboard.dashboard')
@section('content')
    <div class="container-fluid px-4">
        <h1 class="mt-4">Dashboard</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">DESA BUKIAN</li>
        </ol>

        <div>
            <div class="row">
                <!-- Card 1 -->
                <div class="col-lg-3 col-md-6">
                    <div class="card bg-primary text-white mb-4">
                        <div class="card-body">
                            <h4>{{ $totalArtikel }}</h4>
                            <p>Artikel</p>
                        </div>
                        <div class="card-footer d-flex align-items-center justify-content-between">
                            <a class="small text-white stretched-link" href="{{ route('posts.index') }}">Lihat Detail</a>
                            <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                        </div>
                    </div>
                </div>
                <!-- Card 2 -->
                <div class="col-lg-3 col-md-6">
                    <div class="card bg-success text-white mb-4">
                        <div class="card-body">
                            <h4>{{ $totalPengumuman }}</h4>
                            <p>Pengumuman</p>
                        </div>
                        <div class="card-footer d-flex align-items-center justify-content-between">
                            <a class="small text-white stretched-link" href="{{ route('pengumuman.index') }}">Lihat
                                Detail</a>
                            <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                        </div>
                    </div>
                </div>
                <!-- Card 3 -->
                <div class="col-lg-3 col-md-6">
                    <div class="card bg-warning text-white mb-4">
                        <div class="card-body">
                            <h4>{{ $totalGaleri }}</h4>
                            <p>Galeri</p>
                        </div>
                        <div class="card-footer d-flex align-items-center justify-content-between">
                            <a class="small text-white stretched-link" href="{{ route('galeri.index') }}">Lihat Detail</a>
                            <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div>
            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-chart-bar me-1"></i>
                    Statistik Artikel dan Pengumuman
                </div>
                <div class="card-body">
                    <canvas id="statistikChart" width="100%" height="30"></canvas>
                </div>
            </div>

            <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
            <script>
                const ctx = document.getElementById('statistikChart').getContext('2d');
                const statistikChart = new Chart(ctx, {
                    type: 'bar', // Bisa diganti dengan 'pie', 'line', dll.
                    data: {
                        labels: ['Artikel', 'Pengumuman', 'Galeri'],
                        datasets: [{
                            label: 'Jumlah',
                            data: [{{ $totalArtikel }}, {{ $totalPengumuman }},
                            {{ $totalGaleri }}], // Data sesuai dengan jumlah sebenarnya
                            backgroundColor: [
                                'rgba(54, 162, 235, 0.5)', // Biru
                                'rgba(75, 192, 192, 0.5)', // Hijau
                                'rgba(255, 205, 86, 0.5)' // Kuning
                            ],
                            borderColor: [
                                'rgba(54, 162, 235, 1)', // Biru
                                'rgba(75, 192, 192, 1)', // Hijau
                                'rgba(255, 205, 86, 1)' // Kuning
                            ],
                            borderWidth: 1
                        }]
                    },
                    options: {
                        responsive: true,
                        plugins: {
                            legend: {
                                position: 'top',
                            },
                            tooltip: {
                                enabled: true
                            }
                        }
                    }
                });
            </script>
        </div>
    </div>
    </main>
@endsection
