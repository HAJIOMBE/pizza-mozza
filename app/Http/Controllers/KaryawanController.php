<?php

namespace App\Http\Controllers;

use App\Models\Karyawan;
use Illuminate\Http\Request;

class KaryawanController extends Controller
{
    public function index()
    {
        $karyawans = Karyawan::latest()->get();

        return view('admin.karyawan.index', compact('karyawans'));
    }

    public function create()
    {
        return view('admin.karyawan.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'email' => 'required|email|unique:karyawans,email',
            'jabatan' => 'required|string|max:255',
            'no_hp' => 'nullable|string|max:20',
        ]);

        Karyawan::create($validated);

        return redirect()
            ->route('karyawan.index')
            ->with('success', 'Karyawan berhasil ditambahkan.');
    }

    public function show(Karyawan $karyawan)
    {
        return view('admin.karyawan.show', compact('karyawan'));
    }

    public function edit(Karyawan $karyawan)
    {
        return view('admin.karyawan.edit', compact('karyawan'));
    }

    public function update(Request $request, Karyawan $karyawan)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'email' => 'required|email|unique:karyawans,email,' . $karyawan->id,
            'jabatan' => 'required|string|max:255',
            'no_hp' => 'nullable|string|max:20',
        ]);

        $karyawan->update($validated);

        return redirect()
            ->route('karyawan.index')
            ->with('success', 'Data karyawan berhasil diperbarui.');
    }

    public function destroy(Karyawan $karyawan)
    {
        $karyawan->delete();

        return redirect()
            ->route('karyawan.index')
            ->with('success', 'Karyawan berhasil dihapus.');
    }
}