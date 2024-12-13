<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::all();
        return view('dashboard.dashboard-blog.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.dashboard-blog.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // $postingan = $request->all();
        // Validasi input
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string', // Konten wajib ada dan harus berupa string
            'image_url' => 'required|image|mimes:jpg,jpeg,png,gif,svg|max:2048', // Validasi file gambar (opsional)
        ], [
            'title.required' => 'Judul wajib diisi.',
            'title.string' => 'Judul harus berupa teks.',
            'title.max' => 'Judul maksimal 255 karakter.',
            'content.required' => 'Konten wajib diisi.',
            'content.string' => 'Konten harus berupa teks.',
            'image_url.required' => 'Gambar Wajib Diisi.',
            'image_url.image' => 'File yang diunggah harus berupa gambar.',
            'image_url.mimes' => 'Format gambar yang diterima hanya jpg, jpeg, png, gif, atau svg.',
            'image_url.max' => 'Ukuran gambar maksimal 2MB.',
        ]);
        
        // Menyimpan gambar jika ada yang diunggah
        if ($request->hasFile('image_url')) {
            // Ambil nama asli file dan ganti spasi dengan garis bawah
            $originalName = $request->file('image_url')->getClientOriginalName();
            $modifiedName = str_replace(' ', '_', $originalName);
            
            // Simpan file dengan nama asli yang sudah dimodifikasi ke folder postingan
            $imagePath = $request->file('image_url')->move(public_path('assets/image/posts'), $modifiedName);
            
            // Simpan path relatif untuk disimpan ke database
            $imagePath = $modifiedName;
        } else {
            $imagePath = null; // Jika tidak ada gambar, set null
        }
        // dd($postingan, $imagePath);
        // Menggunakan metode create untuk menyimpan data
        Post::create([
            'user_id' => 1,
            'title' => $request->title,
            'content' => $request->content, // Mengambil konten dari Quill
            'slug' => Str::slug($request->title),  // Membuat slug berdasarkan judul
            'image_url' => $imagePath,  // Menyimpan path gambar
        ]);

        // Redirect atau kembalikan response sesuai kebutuhan
        return redirect()->route('posts.index')->with('added', 'Artikel Berhasil Dibuat!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $post = Post::findOrFail($id);
        return view('dashboard.dashboard-blog.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Validasi input
    $validated = $request->validate([
        'title' => 'required|string|max:255',
        'content' => 'required|string', // Konten wajib ada dan harus berupa string
        'image_url' => 'image|mimes:jpg,jpeg,png,gif,svg|max:2048', // Validasi file gambar (opsional)
    ],[
        'title.required' => 'Judul wajib diisi.',
        'title.string' => 'Judul harus berupa teks.',
        'title.max' => 'Judul maksimal 255 karakter.',
        'content.required' => 'Konten wajib diisi.',
        'content.string' => 'Konten harus berupa teks.',
        'image_url.image' => 'File yang diunggah harus berupa gambar.',
        'image_url.mimes' => 'Format gambar yang diterima hanya jpg, jpeg, png, gif, atau svg.',
        'image_url.max' => 'Ukuran gambar maksimal 2MB.',
    ]);
    
    // Cari post berdasarkan ID
    $post = Post::findOrFail($id);

    // Menyimpan gambar baru jika ada yang diunggah
    if ($request->hasFile('image_url')) {
        // Hapus gambar lama jika ada
        if ($post->image_url) {
            $oldImagePath = public_path('assets/image/posts/' . $post->image_url);
            if (file_exists($oldImagePath)) {
                unlink($oldImagePath); // Hapus gambar lama
            }
        }

        // Ambil nama asli file dan ganti spasi dengan garis bawah
        $originalName = $request->file('image_url')->getClientOriginalName();
        $modifiedName = str_replace(' ', '_', $originalName);
        
        // Simpan file dengan nama asli yang sudah dimodifikasi ke folder postingan
        $imagePath = $request->file('image_url')->move(public_path('assets/image/posts'), $modifiedName);
        
        // Simpan path relatif untuk disimpan ke database
        $imagePath = $modifiedName;
    } else {
        // Jika tidak ada gambar baru, gunakan gambar lama
        $imagePath = $post->image_url;
    }

    // dd($request->all(), $imagePath);
    // Update data post
    $post->update([
        'title' => $request->title,
        'content' => $request->content, // Mengambil konten dari editor
        'slug' => Str::slug($request->title),  // Membuat slug berdasarkan judul
        'image_url' => $imagePath,  // Menyimpan path gambar (bisa gambar baru atau lama)
    ]);

    // Redirect atau kembalikan response sesuai kebutuhan
    return redirect()->route('posts.index')->with('edited', 'Artikel Berhasil Diperbarui!');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $post = Post::findOrFail($id);
        $post->delete();
        return redirect()->route('posts.index')->with('success', 'Data berhasil dihapus !');
    }
}
