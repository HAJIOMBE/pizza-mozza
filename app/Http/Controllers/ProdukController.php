<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProdukController extends Controller
{
    public function index()
    {
        $produk = Produk::all();
        return view('admin.produk.index', compact('produk'));
    }

    public function create()
    {
        return view('admin.produk.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_produk' => 'required|unique:PRODUK',
            'nama_produk' => 'required',
            'harga_saat_ini' => 'required|numeric',
            'stok' => 'required|numeric',
            'gambar_produk' => 'image|mimes:jpeg,png,jpg|max:2048'
        ]);

        $gambarPath = null;
        if ($request->hasFile('gambar_produk')) {
            $gambarPath = $request->file('gambar_produk')->store('produk', 'public');
        }

        Produk::create([
            'id_produk' => $request->id_produk,
            'nama_produk' => $request->nama_produk,
            'deskripsi' => $request->deskripsi,
            'harga_saat_ini' => $request->harga_saat_ini,
            'stok' => $request->stok,
            'gambar_produk' => $gambarPath,
            'kategori' => $request->kategori
        ]);

        return redirect()->route('produk.index')->with('success', 'Produk berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $produk = Produk::findOrFail($id);
        return view('admin.produk.edit', compact('produk'));
    }

    public function update(Request $request, $id)
    {
        $produk = Produk::findOrFail($id);

        $request->validate([
            'nama_produk' => 'required',
            'harga_saat_ini' => 'required|numeric',
            'stok' => 'required|numeric',
        ]);

        if ($request->hasFile('gambar_produk')) {
            if ($produk->gambar_produk) {
                Storage::disk('public')->delete($produk->gambar_produk);
            }
            $produk->gambar_produk = $request->file('gambar_produk')->store('produk', 'public');
        }

        $produk->update([
            'nama_produk' => $request->nama_produk,
            'deskripsi' => $request->deskripsi,
            'harga_saat_ini' => $request->harga_saat_ini,
            'stok' => $request->stok,
            'kategori' => $request->kategori
        ]);

        return redirect()->route('produk.index')->with('success', 'Produk berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $produk = Produk::findOrFail($id);
        if ($produk->gambar_produk) {
            Storage::disk('public')->delete($produk->gambar_produk);
        }
        $produk->delete();

        return redirect()->route('produk.index')->with('success', 'Produk berhasil dihapus!');
    }
}