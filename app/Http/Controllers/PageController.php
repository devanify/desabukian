<?php

namespace App\Http\Controllers;

use App\Models\PengurusDesa;
use App\Models\Post;
use Illuminate\Http\Request;

class PageController extends Controller
{
    // Menampilkan halaman utama (Index)
    public function index()
    {
        $pengurus = PengurusDesa::where('status', 'aktif')->get();
        return view('index', compact('pengurus'));
    }

    // Menampilkan halaman galeri
    public function gallery()
    {
        return view('galery');
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
