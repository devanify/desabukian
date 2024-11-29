<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Post;
use App\Models\Galeri;
use App\Models\Infografis;
use App\Models\Pengumuman;
use App\Models\PengurusDesa;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PageController extends Controller
{
    // Menampilkan halaman utama (Index)
    public function index()
    {
        $pengumuman = Pengumuman::orderBy('tanggal_publikasi', 'desc')->take(5)->get();
        $pengurus = PengurusDesa::where('status', 'aktif')->get();
        $currentYear = date('Y');
        $infografis = Infografis::where('tahun', $currentYear)->first();

        return view('index', compact('pengurus', 'infografis', 'pengumuman'));
    }

    // Menampilkan halaman galeri
    public function gallery(Request $request)
    {
        $year = $request->input('year', Carbon::now()->year);

        // Ambil data Galeri berdasarkan tahun
        $galeri = Galeri::when($year, function ($query) use ($year) {
            return $query->whereYear('created_at', $year);
        })->get();

        // Ambil data Post berdasarkan tahun
        $post = Post::when($year, function ($query) use ($year) {
            return $query->whereYear('created_at', $year);
        })->get();

        // Gabungkan data Galeri dan Post dalam satu koleksi
        $combinedData = $galeri->concat($post);

        // Kelompokkan berdasarkan bulan dan tahun
        $groupedData = $combinedData->groupBy(function ($item) {
            return Carbon::parse($item->created_at)->format('F Y');
        });

        // Ambil daftar tahun yang tersedia untuk dropdown filter
        $years = Galeri::selectRaw('YEAR(created_at) as year')
            ->distinct()
            ->orderByDesc('year')
            ->pluck('year');

        // Kirimkan data ke tampilan
        return view('galery', compact('groupedData', 'years'));
    }


    // Menampilkan halaman sejarah
    public function sejarah()
    {
        return view('sejarah');
    }

    // Menampilkan halaman blog
    public function artikel(Request $request)
    {
        $year = $request->input('year', Carbon::now()->year); // Default: tahun sekarang jika tidak ada input

        // Ambil data artikel berdasarkan tahun
        $post = Post::when($year, function ($query) use ($year) {
            return $query->whereYear('created_at', $year);
        })
        ->orderBy('created_at', 'desc') // Urutkan berdasarkan tanggal terbaru
        ->paginate(6); // Paginasi 6 artikel per halaman

        // Ambil daftar tahun dari tabel Post untuk dropdown filter
        $years = Post::selectRaw('YEAR(created_at) as year')
            ->distinct()
            ->orderByDesc('year')
            ->pluck('year');

        // Kirimkan data ke tampilan
        return view('blog', compact('post', 'years', 'year'));
    }

    // Menampilkan halaman artikel
    public function article($slug)
    {
        // Cari artikel berdasarkan slug
        $article = Post::where('slug', $slug)->firstOrFail();

        // Menghapus elemen <span class="ql-ui"> dan atribut yang tidak diinginkan dari <ol> dan <li>
        $cleanedContent = preg_replace('/<span[^>]*class="ql-ui"[^>]*><\/span>/', '', $article->content);

        // Menghapus atribut data-list yang tidak diperlukan di <li>
        $cleanedContent = preg_replace('/\sdata-list="[^"]*"/', '', $cleanedContent);

        // Tampilkan view dengan data artikel
        return view('article', compact('article', 'cleanedContent'));
    }

    public function dashbaord()
    {
        $user = auth()->user(); // Mendapatkan data user yang sedang login

        // Ambil data jumlah dari tabel terkait
        $totalArtikel = Post::count(); // Menghitung jumlah artikel
        $totalPengumuman = Pengumuman::count(); // Menghitung jumlah pengumuman
        $totalGaleri = Galeri::count(); // Menghitung jumlah galeri
        return view('dashboard.dashboard-user.dashboard', compact('totalArtikel', 'totalPengumuman', 'totalGaleri', 'user'));
    }
    public function userEdit()
    {
        $user = auth()->user(); // Mendapatkan data user yang sedang login

        return view('dashboard.dashboard-user.userUpdate', compact('user'));
    }
    public function userUpdate(Request $request)
    {

        // dd($request);
        $request->validate([
            'name' => 'required|string|max:255',
            'password' => 'nullable|string|min:8',
            'confirm_password' => 'required_with:password|same:password'
        ], [
            'name.required' => 'Nama wajib diisi.',
            'name.string' => 'Nama harus berupa teks.',
            'name.max' => 'Nama tidak boleh lebih dari 255 karakter.',
            'password.nullable' => 'Password bersifat opsional.',
            'password.string' => 'Password harus berupa teks.',
            'password.min' => 'Password harus memiliki minimal 8 karakter.',
            'confirm_password.required_with' => 'Konfirmasi password harus diisi jika password diisi.',
            'confirm_password.same' => 'Konfirmasi password harus sama dengan password.',
        ]);

        $data = [
            'name' => $request->name,
            'password' => $request->password ? bcrypt($request->password) : Auth::user()->password
        ];

        User::where('id', Auth::user()->id)->update($data);

        return redirect()->route('dashboard')->with('edited', "Data berhasil diperbarui");
    }

    public function pengumuman()
    {
        // Mengambil data pengumuman terbaru berdasarkan 'tanggal_publikasi' dengan pagination
        $pengumuman = Pengumuman::orderBy('tanggal_publikasi', 'desc')->paginate(10);
        return view('pengumuman', compact('pengumuman'));
    }

    public function pengumumanview($slug)
    {
        // Cari artikel berdasarkan slug
        $pengumuman = Pengumuman::where('slug', $slug)->firstOrFail();
        // Tampilkan view dengan data artikel
        return view('pengumuman_view', compact('pengumuman'));
    }
}
