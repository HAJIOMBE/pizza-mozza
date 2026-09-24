<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $admins = Admin::latest()->get();

        return view('admin.admins.index', compact('admins'));
    }

    public function create()
    {
        return view('admin.admins.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'email' => 'required|email|unique:admins,email',
            'jabatan' => 'required|string|max:255',
            'no_hp' => 'nullable|string|max:20',
        ]);

        Admin::create($validated);

        return redirect()
            ->route('admin.admins.index')
            ->with('success', 'Admin berhasil ditambahkan.');
    }

    public function show(Admin $admin)
    {
        return view('admin.admins.show', compact('admin'));
    }

    public function edit(Admin $admin)
    {
        return view('admin.admins.edit', compact('admin'));
    }

    public function update(Request $request, Admin $admin)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'email' => 'required|email|unique:admins,email,' . $admin->id,
            'jabatan' => 'required|string|max:255',
            'no_hp' => 'nullable|string|max:20',
        ]);

        $admin->update($validated);

        return redirect()
            ->route('admin.admins.index')
            ->with('success', 'Data admin berhasil diperbarui.');
    }

    public function destroy(Admin $admin)
    {
        $admin->delete();

        return redirect()
            ->route('admin.admins.index')
            ->with('success', 'Admin berhasil dihapus.');
    }
    
}