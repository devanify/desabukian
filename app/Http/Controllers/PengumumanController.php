<?php

namespace App\Http\Controllers;

use App\Models\Pengumuman;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class PengumumanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pengumuman = Pengumuman::all();
        return view('dashboard.dashboard-pengumuman.index', compact('pengumuman'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.dashboard-pengumuman.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validasi input dengan pesan error kustom
        $request->validate([
            'judul' => 'required|string|max:255',
            'media' => 'required|file|mimes:jpeg,png,jpg,gif,svg,pdf|max:2048', // Media bisa berupa gambar atau file
            'tanggal_publikasi' => 'required|date',
        ], [
            // Pesan error khusus
            'judul.required' => 'Judul pengumuman harus diisi.',
            'judul.string' => 'Judul pengumuman harus berupa teks.',
            'judul.max' => 'Judul pengumuman maksimal 255 karakter.',
            'media.required' => 'Media (foto atau video) harus diunggah.',
            'media.file' => 'Format media yang diunggah tidak valid.',
            'media.mimes' => 'Media harus berupa gambar dengan format jpeg, png, jpg, gif, svg atau file pdf.',
            'media.max' => 'Ukuran media maksimal 2MB.',
            'tanggal_publikasi.required' => 'Tanggal publikasi harus diisi.',
            'tanggal_publikasi.date' => 'Tanggal publikasi tidak valid.',
        ]);

        // Simpan file media jika ada
        $mediaPath = null;
        if ($request->hasFile('media')) {
            // Ambil nama asli file dan nama tanpa ekstensi
            $originalName = $request->file('media')->getClientOriginalName();
            $nameWithoutExtension = pathinfo($originalName, PATHINFO_FILENAME);

            // Formating nama dengan mengganti spasi menjadi garis bawah dan menambahkan UUID
            $formattedNama = str_replace(' ', '_', $request->judul); // Anda bisa sesuaikan, misalnya berdasarkan 'judul'
            $uuid = (string) Str::uuid();
            $formattedName = $formattedNama . '-' . $uuid . '.' . $request->file('media')->extension();

            // Pindahkan file ke public path
            $request->file('media')->move(public_path('assets/image/pengumuman'), $formattedName);

            // Simpan hanya nama file ke database
            $mediaPath = $formattedName;
        }
        // Simpan pengumuman ke database
        Pengumuman::create([
            'judul' => $request->judul,
            'media' => $mediaPath,  // Menyimpan path nama file media
            'user_id' => 1, // ID pengguna yang login
            'tanggal_publikasi' => $request->tanggal_publikasi,
        ]);

        // Menampilkan pesan sukses
        return redirect()->route('pengumuman.index')->with('added', 'Pengumuman berhasil disimpan!');
    }

    /**
     * Display the specified resource.
     */
    public function show($file)
    {
        return view('dashboard.dashboard-pengumuman.show', compact('file'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
