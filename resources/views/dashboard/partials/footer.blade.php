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
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
   @if(session('added'))
   Swal.fire({
            icon: 'success',
            title: 'Berhasil!',
            text: '{{ session('added') }}'
        });
   @endif
   @if(session('edited'))
   Swal.fire({
            icon: 'success',
            title: 'Berhasil!',
            text: '{{ session('edited') }}'
        });
   @endif

    
</script>
    crossorigin="anonymous"></script>
<script src="{{ asset('assets/js/datatables-simple-demo.js') }}"></script>
</body>

</html>