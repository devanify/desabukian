<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use App\Models\PengurusDesa;
use Illuminate\Http\Request;
use Database\Seeders\PengurusDesaSeeder;

class PengurusDesaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pengurusdesa = PengurusDesa::all();

        return view('dashboard.dashboard-pengurusdesa.index', compact('pengurusdesa'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.dashboard-pengurusdesa.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'jabatan' => 'required|string|max:255',
            'telepon' => 'nullable',
            'gambar' => 'required|image|mimes:jpg,jpeg,png,gif|max:2048',
        ],[
            'nama.required' => 'Nama harus diisi.',
            'nama.string' => 'Nama harus berupa teks.',
            'nama.max' => 'Nama tidak boleh lebih dari 255 karakter.',
            'jabatan.required' => 'Jabatan harus diisi.',
            'jabatan.string' => 'Jabatan harus berupa teks.',
            'jabatan.max' => 'Jabatan tidak boleh lebih dari 255 karakter.',
            'status.required' => 'Status harus diisi.',
            'status.string' => 'Status harus berupa teks.',
            'gambar.required' => 'Gambar wajib diisi.',
            'gambar.image' => 'File yang diunggah harus berupa gambar.',
            'gambar.mimes' => 'Gambar harus berformat JPG, JPEG, PNG, atau GIF.',
            'gambar.max' => 'Ukuran gambar tidak boleh lebih dari 2MB.',
        ]);
        // Simpan file gambar jika ada
        $gambarPath = null;
        if ($request->hasFile('gambar')) {
            $originalName = $request->file('gambar')->getClientOriginalName();
            $nameWithoutExtension = pathinfo($originalName, PATHINFO_FILENAME);

            $formattedNama = str_replace(' ', '_', $request->nama);
            $formattedjabatan = str_replace(' ', '_', $request->jabatan);
            $uuid = (string) Str::uuid();
            $formattedName = $formattedjabatan . '-' . $formattedNama . $uuid . '.' . $request->file('gambar')->extension();

            // Pindahkan file ke public path
            $request->file('gambar')->move(public_path('assets/image/pengurus_desa'), $formattedName);

            // Simpan hanya nama file ke database
            $gambarPath = $formattedName;
        }

        // Simpan data ke database
        PengurusDesa::create([
            'nama' => $request->nama,
            'jabatan' => $request->jabatan,
            'telepon' => $request->telepon,
            'gambar' => $gambarPath,
        ]);

        return redirect()->route('pengurusdesa.index')->with('success', 'Pengurus desa berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(PengurusDesa $pengurusDesa) {}

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $pengurus = PengurusDesa::findOrFail($id);
        return view('dashboard.dashboard-pengurusdesa.edit', compact('pengurus'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Validasi data yang diterima dari form
        $request->validate([
            'nama' => 'required|string|max:255',
            'jabatan' => 'required|string|max:255',
            'telepon' => 'nullable',
            'status' => 'required|string',
            'gambar' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048',
        ], [
            'nama.required' => 'Nama harus diisi.',
            'nama.string' => 'Nama harus berupa teks.',
            'nama.max' => 'Nama tidak boleh lebih dari 255 karakter.',
            'jabatan.required' => 'Jabatan harus diisi.',
            'jabatan.string' => 'Jabatan harus berupa teks.',
            'jabatan.max' => 'Jabatan tidak boleh lebih dari 255 karakter.',
            'status.required' => 'Status harus diisi.',
            'status.string' => 'Status harus berupa teks.',
            'gambar.nullable' => 'Gambar boleh tidak diisi.',
            'gambar.image' => 'File yang diunggah harus berupa gambar.',
            'gambar.mimes' => 'Gambar harus berformat JPG, JPEG, PNG, atau GIF.',
            'gambar.max' => 'Ukuran gambar tidak boleh lebih dari 2MB.',
        ]);

        // Mencari pengurus desa berdasarkan ID
        $pengurus = PengurusDesa::findOrFail($id);

        // Menyimpan gambar jika ada
        $gambarPath = $pengurus->gambar; // Set default to the existing image path if no new image is uploaded

        if ($request->hasFile('gambar')) {
            // Hapus gambar lama jika ada
            if ($pengurus->gambar && file_exists(public_path('assets/image/pengurus_desa/' . $pengurus->gambar))) {
                unlink(public_path('assets/image/pengurus_desa/' . $pengurus->gambar));
            }

            // Ambil file gambar yang di-upload
            $originalName = $request->file('gambar')->getClientOriginalName();
            $nameWithoutExtension = pathinfo($originalName, PATHINFO_FILENAME);

            // Format nama dengan menghilangkan spasi dan menambahkan UUID
            $formattedNama = str_replace(' ', '_', $request->nama);
            $formattedJabatan = str_replace(' ', '_', $request->jabatan);
            $uuid = (string) Str::uuid();  // Menghasilkan UUID
            $formattedName = $formattedJabatan . '-' . $formattedNama . '-' . $uuid . '.' . $request->file('gambar')->extension();

            // Pindahkan file ke public path
            $request->file('gambar')->move(public_path('assets/image/pengurus_desa'), $formattedName);

            // Simpan nama file yang diformat ke database
            $gambarPath = $formattedName;
        }

        // Update data pengurus desa
        $pengurus->update([
            'nama' => $request->nama,
            'jabatan' => $request->jabatan,
            'telepon' => $request->telepon,
            'status' => $request->status,
            'gambar' => $gambarPath,  // Menyimpan gambar yang baru atau gambar lama
        ]);

        // Redirect ke halaman daftar pengurus desa dengan pesan sukses
        return redirect()->route('pengurusdesa.index')->with('success', 'Data pengurus desa berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $pengurusdesa = PengurusDesa::findOrFail($id);
        $pengurusdesa->delete();
        return redirect()->route('pengurusdesa.index')->with('success', 'Data berhasil dihapus !');
    }
}
