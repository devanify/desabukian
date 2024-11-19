<?php

namespace App\Http\Controllers;

use App\Models\Galeri;
use Illuminate\Http\Request;

class GaleriController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $galeri = Galeri::all();
        return view("dashboard.dashboard-galeri.index", compact('galeri'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("dashboard.dashboard-galeri.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate(([
            'image_url' => 'required|image|mimes:jpg,jpeg,png,gif,svg|max:2048',
            'description' => 'required|string'
        ]));


        $originalName = $request->file('image_url')->getClientOriginalName();
        $modifiedName = str_replace(' ', '_', $originalName);

        // Simpan file dengan nama asli yang sudah dimodifikasi ke folder postingan
        $imagePath = $request->file('image_url')->move(public_path('assets/image/galeri'), $modifiedName);

        // Simpan path relatif untuk disimpan ke database
        $imagePath = $modifiedName;

        Galeri::create([
            'user_id' => 1,
            'image_url' => $imagePath,
            'description' => $request->description
        ]);

        return redirect()->route('galeri.index')->with('success', 'Galeri created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(galeri $galeri)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit( string $id)
    {
        $galeri = Galeri::findOrFail($id);
        return view('dashboard.dashboard-galeri.edit', compact('galeri'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // Validasi input
    $validated = $request->validate([
        'image_url' => 'nullable|image|mimes:jpg,jpeg,png,gif,svg|max:2048',
        'description' => 'required|string'
    ]);

        // Cari data galeri berdasarkan ID
    $galeri = Galeri::findOrFail($id);

    // Proses file gambar baru jika ada
    if ($request->hasFile('image_url')) {
        // Hapus file lama jika ada
        $oldImagePath = public_path('assets/image/galeri/' . $galeri->image_url);
        if (file_exists($oldImagePath) && $galeri->image_url) {
            unlink($oldImagePath);
        }

        // Upload file baru
        $originalName = $request->file('image_url')->getClientOriginalName();
        $modifiedName = str_replace(' ', '_', $originalName);
        $newImagePath = $request->file('image_url')->move(public_path('assets/image/galeri'), $modifiedName);

        // Simpan nama file baru
        $galeri->image_url = $modifiedName;
    }



    // Update deskripsi
    $galeri->description = $request->description;


    // dd($request->all(), $galeri->toArray());

    // Simpan perubahan
    $galeri->save();

    // Redirect ke halaman index galeri dengan pesan sukses
    return redirect()->route('galeri.index')->with('success', 'Galeri updated successfully!');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(galeri $galeri)
    {
        //
    }
}
