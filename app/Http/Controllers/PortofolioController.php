<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Portofolio;
use App\Models\PortofolioImage;

class PortofolioController extends Controller
{
    public function index()
    {
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
        'title' => 'required|string|max:255',
        'description' => 'required|string',
        'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        'pdf_path' => 'nullable|mimes:pdf',
        'images.*' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
    ]);

    // Simpan gambar utama
    $image = $request->file('image');
    $imageName = time() . '_' . $image->getClientOriginalName();
    $image->move(public_path('portofolio_images'), $imageName);

    // Simpan file PDF jika ada
    $pdfName = null;
    if ($request->hasFile('pdf_path')) {
        $pdf = $request->file('pdf_path');
        $pdfName = time() . '_' . $pdf->getClientOriginalName();
        $pdf->move(public_path('portofolio_pdfs'), $pdfName);
    }

    // Simpan ke tabel utama
    $portofolio = Portofolio::create([
        'image' => 'portofolio_images/' . $imageName,
        'title' => $request->title,
        'description' => $request->description,
        'pdf_path' => $pdfName ? 'portofolio_pdfs/' . $pdfName : null,
    ]);

    // Simpan gambar tambahan (jika ada)
    if ($request->hasFile('images')) {
        foreach ($request->file('images') as $additionalImage) {
            $addImageName = time() . '_' . $additionalImage->getClientOriginalName();
            $additionalImage->move(public_path('portofolio_images'), $addImageName);

            PortofolioImage::create([
                'portofolio_id' => $portofolio->id,
                'image' => 'portofolio_images/' . $addImageName,
            ]);
        }
    }

    return redirect()->route('admin.portofolio.index')->with('success', 'Portofolio berhasil ditambahkan.');
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
