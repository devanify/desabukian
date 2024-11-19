# Website Desa Bukian

Website resmi Desa Bukian yang memberikan informasi lengkap mengenai kegiatan, berita, sejarah desa, fasilitas, dan lainnya. Website ini bertujuan untuk mempermudah warga dan pengunjung dalam mendapatkan informasi serta berinteraksi dengan pemerintah desa.


## Fitur Utama

### 1. **Blog/Artikel**
   Menyediakan berbagai artikel dan berita terbaru terkait dengan kegiatan desa, informasi penting, dan tips berguna bagi warga desa.

### 2. **Galeri**
   Fitur galeri foto untuk melihat dokumentasi acara dan kegiatan yang dilakukan di desa Bukian.

### 3. **Sejarah Desa**
   Halaman yang menceritakan sejarah desa Bukian, perkembangan desa dari masa ke masa, dan informasi bersejarah yang penting untuk diketahui oleh warga dan pengunjung.

### 4. **Halaman Profil**
   Halaman yang menampilkan informasi lengkap tentang pemerintahan desa, visi dan misi, serta struktur organisasi yang ada di Desa Bukian.

### 5. **Dashboard Admin**
   Halaman admin untuk mengelola artikel, pengumuman, galeri, dan data desa lainnya. Admin dapat mengakses fitur seperti menambah atau mengedit artikel, melihat statistik kunjungan, dan mengelola pengumuman.

### 6. **Pengumuman**
   Fitur untuk menampilkan pengumuman terbaru yang penting bagi warga desa, seperti acara, peraturan baru, atau informasi penting lainnya.

## Teknologi Yang Digunakan

- **Laravel**: Framework PHP yang digunakan untuk membangun backend aplikasi.
- **MySQL**: Database yang digunakan untuk menyimpan data desa, warga, artikel, dan lainnya.
- **Bootstrap**: Framework CSS yang digunakan untuk membuat tampilan web yang responsif.
- **jQuery**: Library JavaScript yang digunakan untuk meningkatkan interaktivitas di website.
- **PHP**: Bahasa pemrograman utama yang digunakan dalam pengembangan backend.
- 
## Instalasi
### Persyaratan Sistem

1. PHP >= 8.0
2. Composer
3. MySQL atau MariaDB
4. Nginx atau Apache
5. Node.js (untuk pembangunan frontend jika diperlukan)

### Langkah-Langkah Instalasi

1. **Clone repository ini**

   ```bash
   git clone https://github.com/username/repository.git
   cd repository
   ```
Install dependencies dengan Composer


```bash
composer install
```
Setel file .env

Salin file .env.example ke .env dan sesuaikan konfigurasi database dan lainnya.

```bash
cp .env.example .env
```
Edit .env untuk menyesuaikan dengan konfigurasi server dan database Anda:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=desa_bukian
DB_USERNAME=root
DB_PASSWORD=yourpassword
```

Migrate database
Jalankan migrasi untuk membuat tabel yang diperlukan di database:

```bash
php artisan migrate
```

Jalankan server laravel

```bash
php artisan serve
```
Akses website di http://localhost:8000.

Fitur Admin
- Login Admin: Untuk masuk ke dashboard admin, gunakan kredensial admin yang sudah disediakan.
- Manajemen Artikel: Admin dapat menambah, mengedit, dan menghapus artikel atau berita di website.
- Manajemen Galeri: Admin dapat menambah dan mengelola foto-foto yang ada di galeri.
- Manajemen Pengumuman: Admin dapat menambah dan mengedit pengumuman untuk warga desa.
- Pengaturan Profil Desa: Admin dapat mengelola informasi profil desa, termasuk sejarah, visi misi, dan struktur organisasi.

### Kontribusi
Kami sangat menghargai kontribusi dari semua pihak. Jika Anda ingin berkontribusi, silakan buka Issue atau kirim pull request Anda.

Langkah-langkah kontribusi:

1. Fork repositori ini.
2. Buat branch baru (git checkout -b fitur-baru).
3. Commit perubahan Anda (git commit -am 'Menambahkan fitur baru').
4. Push branch Anda (git push origin fitur-baru).
5. Buat Pull Request.

### Penjelasan Pembaruan:
1. **Fitur Utama**: Telah diperbarui untuk mencakup fitur-fitur yang Anda inginkan, seperti **Blog/Artikel**, **Galeri**, **Sejarah Desa**, **Halaman Profil**, **Dashboard Admin**, dan **Pengumuman**.
2. **Dashboard Admin**: Ditambahkan penjelasan tentang bagaimana admin dapat mengelola artikel, galeri, dan pengumuman dari dashboard.
3. **Instalasi**: Proses instalasi tetap sama, namun bisa diperbarui jika ada penambahan dependensi atau konfigurasi lebih lanjut.


#Next Fiture
1. Infografis
2. User Sistem