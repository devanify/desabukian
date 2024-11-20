<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Post;
use App\Models\Galeri;
use App\Models\Infografis;
use App\Models\PengurusDesa;
use Illuminate\Http\Request;

class PageController extends Controller
{
    // Menampilkan halaman utama (Index)
    public function index()
    {
        $pengurus = PengurusDesa::where('status', 'aktif')->get();
        $currentYear = date('Y');
        $infografis = Infografis::where('tahun', $currentYear)->first();

        return view('index', compact('pengurus','infografis'));
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

    // Menampilkan halaman login
    public function login()
    {
        return view('login');
    }

    // Menampilkan halaman blog
    public function blog()
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
        return view('dashboard.dashboard');
    }
}
