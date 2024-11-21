window.addEventListener('DOMContentLoaded', event => {
    // Simple-DataTables
    // https://github.com/fiduswriter/Simple-DataTables/wiki

    const datatablesSimple = document.getElementById('datatablesSimple');
    if (datatablesSimple) {
        // new simpleDatatables.DataTable(datatablesSimple);
        const dataTable = new simpleDatatables.DataTable(datatablesSimple);

        // Tambahkan class ke kolom Aksi (kolom terakhir) setelah tabel selesai di-render
        dataTable.on('datatable.init', () => {
            const rows = datatablesSimple.querySelectorAll('tbody tr');
            // Tambahkan kelas setelah tabel di-render oleh DataTables
            dataTable.on('datatable.init', () => {
                const cells = document.querySelectorAll('#datatablesSimple tbody td');
                cells.forEach(cell => {
                    cell.classList.add('align-middle', 'text-center');
                });
            });
        });
    }
});
