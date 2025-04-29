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
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // Validasi gambar
        ]);

        $portofolio = new Portofolio;
        $portofolio->image = $request->file('image')->store('portofolio_images', 'public');
        $portofolio->save();

        return redirect()->route('admin.portofolio.index')->with('success', 'Foto portofolio berhasil ditambahkan.');
    }

    public function destroy($id)
    {
        $portofolio = Portofolio::findOrFail($id);
        $imagePath = storage_path('app/public/' . $portofolio->image);

        if (file_exists($imagePath)) {
            unlink($imagePath); // Hapus gambar
        }

        $portofolio->delete();
        return redirect()->route('admin.portofolio.index')->with('success', 'Foto portofolio berhasil dihapus.');
    }
}
