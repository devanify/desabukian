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
        $pengurus = PengurusDesa::where('status', 'aktif')->get();
        $currentYear = date('Y');
        $infografis = Infografis::where('tahun', $currentYear)->first();

        return view('index', compact('pengurus', 'infografis'));
    }

    // Menampilkan halaman galeri
    public function gallery(Request $request)
    {
        $year = $request->input('year', Carbon::now()->year);

        // Ambil galeri dan kelompokkan berdasarkan bulan dan tahun
        $galeri = Galeri::when($year, function ($query) use ($year) {
            // Jika ada input tahun, filter galeri berdasarkan tahun
            return $query->whereYear('created_at', $year);
        })->get()->groupBy(function ($date) {
            // Mengelompokkan berdasarkan bulan dan tahun
            return Carbon::parse($date->created_at)->format('F Y');
        });

        // Ambil daftar tahun yang tersedia untuk dropdown filter
        $years = Galeri::selectRaw('YEAR(created_at) as year')
            ->distinct()
            ->orderByDesc('year')
            ->pluck('year');

        return view('galery', compact('galeri', 'years'));
    }
    // Menampilkan halaman sejarah
    public function sejarah()
    {
        return view('sejarah');
    }

    // Menampilkan halaman blog
    public function artikel()
    {
        $post = Post::paginate(6);
        // $post = Post::all();
        return view('blog', compact('post'));
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
        return view('dashboard.dashboard-user.dashboard', compact('totalArtikel', 'totalPengumuman', 'totalGaleri','user'));
    }
    public function userEdit()
    {
        $user = auth()->user(); // Mendapatkan data user yang sedang login

        return view('dashboard.dashboard-user.userUpdate', compact('user'));
    }
    public function userUpdate(Request $request)
    {

        // dd($request);
        $request ->validate([
            'name' => 'required|string|max:255',
            'password' => 'nullable|string|min:8',
            'confirm_password'=> 'required_with:password|same:password'
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
            'password' => $request->password ? bcrypt($request->password): Auth::user()->password
        ];

        User::where('id', Auth::user()->id)->update($data);

        return redirect()->route('dashboard')->with('edited', "Data berhasil diperbarui");
    }
}
