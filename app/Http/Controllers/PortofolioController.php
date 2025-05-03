<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Portofolio;

class PortofolioController extends Controller
{
    public function index()
    {
        // Ambil semua portofolio yang ada
        $portofolios = Portofolio::all();
        return view('admin.portofolio.index', compact('portofolios'));
    }

    public function create()
    {
        return view('admin.portofolio.create');
    }

    public function store(Request $request)
{
    $request->validate([
        'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        'category' => 'nullable|string|max:100', // ← Validasi category
    ]);

    $image = $request->file('image');
    $imageName = time() . '_' . $image->getClientOriginalName();
    $image->move(public_path('portofolio_images'), $imageName);

    Portofolio::create([
        'image' => 'portofolio_images/' . $imageName,
        'category' => $request->category, // ← Simpan kategori ke DB
    ]);

    return redirect()->route('admin.portofolio.index')->with('success', 'Foto portofolio berhasil ditambahkan.');
}


public function destroy($id)
{
    $portofolio = Portofolio::findOrFail($id);
    $imagePath = public_path($portofolio->image);

    if (file_exists($imagePath)) {
        unlink($imagePath);
    }

    $portofolio->delete();
    return redirect()->route('admin.portofolio.index')->with('success', 'Foto portofolio berhasil dihapus.');
}
public function showPortofolioPage()
{
    $portofolios = Portofolio::latest()->get();
    return view('wikrama.portofolio', compact('portofolios'));
}

}
