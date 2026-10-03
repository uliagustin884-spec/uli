<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use Illuminate\Http\Request;

class MahasiswaController extends Controller
{
    /**
     * Menampilkan daftar data mahasiswa.
     * Dapat diakses oleh Admin maupun User biasa.
     */
    public function index()
    {
        $mahasiswa = Mahasiswa::all();
        return view('mahasiswa.index', compact('mahasiswa'));
    }

    /**
     * Menampilkan formulir tambah mahasiswa (Khusus Admin).
     */
    public function create()
    {
        return view('mahasiswa.create');
    }

    /**
     * Menyimpan data mahasiswa baru ke database (Khusus Admin).
     */
    public function store(Request $request)
    {
        $request->validate([
            'nim' => 'required|unique:mahasiswas,nim',
            'nama' => 'required',
            'program_studi' => 'required',
            'email' => 'required|email|unique:mahasiswas,email',
            'angkatan' => 'required',
        ]);

        Mahasiswa::create($request->all());

        return redirect()->route('mahasiswa.index')->with('success', 'Data mahasiswa berhasil ditambahkan.');
    }

    /**
     * Menampilkan data mahasiswa tertentu (Tidak dipakai karena langsung Edit).
     */
    public function show(Mahasiswa $mahasiswa)
    {
        //
    }

    /**
     * Menampilkan formulir edit data mahasiswa (Khusus Admin).
     */
    public function edit(Mahasiswa $mahasiswa)
    {
        return view('mahasiswa.edit', compact('mahasiswa'));
    }

    /**
     * Memperbarui data mahasiswa di database (Khusus Admin).
     */
    public function update(Request $request, Mahasiswa $mahasiswa)
    {
        $request->validate([
            'nim' => 'required|unique:mahasiswas,nim,' . $mahasiswa->id,
            'nama' => 'required',
            'program_studi' => 'required',
            'email' => 'required|email|unique:mahasiswas,email,' . $mahasiswa->id,
            'angkatan' => 'required',
        ]);

        $mahasiswa->update($request->all());

        return redirect()->route('mahasiswa.index')->with('success', 'Data mahasiswa berhasil diperbarui.');
    }

    /**
     * Menghapus data mahasiswa dari database (Khusus Admin).
     */
    public function destroy(Mahasiswa $mahasiswa)
    {
        $mahasiswa->delete();

        return redirect()->route('mahasiswa.index')->with('success', 'Data mahasiswa berhasil dihapus.');
    }
}