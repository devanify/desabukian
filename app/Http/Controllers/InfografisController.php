<?php

namespace App\Http\Controllers;

use App\Models\Infografis;
use Illuminate\Http\Request;

class InfografisController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $infografis = Infografis::all();

        return view('dashboard.dashboard-infografis.index', compact('infografis'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.dashboard-infografis.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all());
        // Validasi data input dengan pesan kustom
    $validated = $request->validate([
        'tahun' => 'required|numeric|digits:4|min:1900|max:' . date('Y').'|unique:infografis,tahun',
        'jumlah_penduduk' => 'required|numeric|min:1',
        'jumlah_kk' => 'required|numeric|min:1',
        'jumlah_pria' => 'required|numeric|min:0',
        'jumlah_perempuan' => 'required|numeric|min:0',
    ], [
        'tahun.required' => 'Tahun harus diisi.',
        'tahun.numeric' => 'Tahun harus berupa angka.',
        'tahun.digits' => 'Tahun harus terdiri dari 4 digit.',
        'tahun.min' => 'Tahun tidak boleh lebih kecil dari 1900.',
        'tahun.max' => 'Tahun tidak boleh lebih besar dari tahun sekarang.',
        'tahun.unique' => 'Tahun tersebut sudah ada dalam data infografis.',
        'jumlah_penduduk.required' => 'Jumlah Penduduk harus diisi.',
        'jumlah_penduduk.numeric' => 'Jumlah Penduduk harus berupa angka.',
        'jumlah_penduduk.min' => 'Jumlah Penduduk tidak boleh kurang dari 1.',
        'jumlah_kk.required' => 'Jumlah KK harus diisi.',
        'jumlah_kk.numeric' => 'Jumlah KK harus berupa angka.',
        'jumlah_kk.min' => 'Jumlah KK tidak boleh kurang dari 1.',
        'jumlah_pria.required' => 'Jumlah Pria harus diisi.',
        'jumlah_pria.numeric' => 'Jumlah Pria harus berupa angka.',
        'jumlah_pria.min' => 'Jumlah Pria tidak boleh kurang dari 0.',
        'jumlah_perempuan.required' => 'Jumlah Perempuan harus diisi.',
        'jumlah_perempuan.numeric' => 'Jumlah Perempuan harus berupa angka.',
        'jumlah_perempuan.min' => 'Jumlah Perempuan tidak boleh kurang dari 0.',
    ]);


        Infografis::create([
            'user_id'=>1,
            'tahun'=>$request->tahun,
            'jumlah_penduduk'=> $request->jumlah_penduduk,
            'jumlah_kk'=> $request->jumlah_kk,
            'jumlah_pria'=> $request->jumlah_pria,
            'jumlah_perempuan'=> $request->jumlah_perempuan
        ]);

        return redirect()->route('infografis.index')->with('added', 'Data infografis Penduduk berhasil disimpan');
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
