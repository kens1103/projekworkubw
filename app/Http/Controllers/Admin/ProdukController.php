<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Produk;
use Illuminate\Support\Facades\Storage;

class ProdukController extends Controller
{
    public function index()
    {
        $produks = Produk::all();
        return view('admin.produk.index', compact('produks'));
    }
    public function create()
    {
        return view('admin.produk.create');
    }
    public function store(Request $request)
{
    $request->validate([
        'title' => 'required|string|max:255',
        'kategori' => 'required|string|max:255', // tambahkan validasi kategori
        'image' => 'required|image|mimes:jpg,jpeg,png,webp|max:2048',
        'description' => 'required|string|max:1000',
    ]);

    $path = $request->file('image')->store('produk', 'public');

    Produk::create([
        'title' => $request->title,
        'kategori' => $request->kategori, // simpan kategori
        'image' => $path,
        'description' => $request->description,
    ]);

    return redirect()->route('admin.produk.index')->with('success', 'Produk berhasil ditambahkan!');
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
        'title' => 'required|string|max:255',
        'kategori' => 'required|string|max:255', // validasi kategori juga
        'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        'description' => 'nullable|string|max:1000',
    ]);

    if ($request->hasFile('image')) {
        Storage::disk('public')->delete($produk->image);
        $path = $request->file('image')->store('produk', 'public');
        $produk->image = $path;
    }

    $produk->title = $request->title;
    $produk->kategori = $request->kategori; // update kategori
    $produk->description = $request->description;
    $produk->save();

    return redirect()->route('admin.produk.index')->with('success', 'Produk berhasil diupdate!');
}
    public function destroy($id)
    {
        $produk = Produk::findOrFail($id);
        Storage::disk('public')->delete($produk->image);
        $produk->delete();

        return redirect()->route('admin.produk.index')->with('success', 'Produk berhasil dihapus!');
    }
}
