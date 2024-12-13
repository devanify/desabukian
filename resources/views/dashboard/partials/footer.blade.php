<footer class="py-4 bg-light mt-auto">
    <div class="container-fluid px-4">
        <div class="text-center small">
            Copyright &copy; Desa Bukian <span id="year"></span>
        </div>
    </div>
</footer>
</div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous">
</script>
<script src="{{ asset('assets/js/scripts.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js"></script>
{{-- <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script> --}}
<script>
    document.addEventListener('DOMContentLoaded', function() {
        document.querySelectorAll('.delete').forEach(function(button) {
            button.addEventListener('click', function(event) {
                event.preventDefault(); // Mencegah submit form otomatis

                const form = this.closest('form'); // Ambil form terdekat dari tombol
                const dataName = this.getAttribute(
                'data-name'); // Ambil nilai dari atribut data-name

                Swal.fire({
                    title: 'Apakah Anda yakin?',
                    text: 'Data ' + dataName + ' yang dihapus tidak bisa dikembalikan!',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Ya, hapus!',
                    cancelButtonText: 'Batal'
                }).then((result) => {
                    if (result.isConfirmed) {
                        form.submit(); // Submit form jika dikonfirmasi
                    } else {
                        Swal.fire('Data Anda aman!', '',
                        'info'); // Tampilkan pesan jika dibatalkan
                    }
                });
            });
        });
    });
</script>
<script>
    @if (session('added'))
        Swal.fire({
            icon: 'success',
            title: 'Berhasil!',
            text: '{{ session('added') }}'
        });
    @endif
    @if (session('edited'))
        Swal.fire({
            icon: 'success',
            title: 'Berhasil!',
            text: '{{ session('edited') }}'
        });
    @endif
    @if (session('success'))
        Swal.fire({
            icon: 'success',
            title: 'Selamat Datang',
            text: "{{ session('success') }}",
        });
    @endif
    @if (session('Logged'))
        Swal.fire({
            icon: 'info',
            title: 'Selamat Datang',
            text: "{{ session('Logged') }}",
        });
    @endif
</script>
crossorigin="anonymous"></script>
<script src="{{ asset('assets/js/datatables-simple-demo.js') }}"></script>
</body>

</html>
