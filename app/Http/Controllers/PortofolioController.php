<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Portofolio;
use App\Models\PortofolioImage;
use Barryvdh\DomPDF\Facade\Pdf;

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
        'kategori' => 'required|string|max:255', // ✅ validasi kategori
        'description' => 'required|string',
        'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        'images.*' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
    ]);

    $image = $request->file('image');
    $imageName = time() . '_' . $image->getClientOriginalName();
    $image->move(public_path('portofolio_images'), $imageName);

    $portofolio = Portofolio::create([
        'title' => $request->title,
        'kategori' => $request->kategori, // ✅ simpan kategori
        'description' => $request->description,
        'image' => 'portofolio_images/' . $imageName,
        'pdf_path' => null,
    ]);

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

    $portofolio->load('additionalImages');
    $pdf = Pdf::loadView('admin.portofolio.pdf', compact('portofolio'));
    $pdfName = 'portofolio_' . time() . '.pdf';
    $pdf->save(public_path('portofolio_pdfs/' . $pdfName));

    $portofolio->update([
        'pdf_path' => 'portofolio_pdfs/' . $pdfName,
    ]);

    return redirect()->route('admin.portofolio.index')->with('success', 'Portofolio berhasil ditambahkan.');
}


    public function edit($id)
    {
        $portofolio = Portofolio::with('additionalImages')->findOrFail($id);
        return view('admin.portofolio.edit', compact('portofolio'));
    }

    public function update(Request $request, $id)
{
    $portofolio = Portofolio::findOrFail($id);

    $request->validate([
        'title' => 'required|string|max:255',
        'kategori' => 'required|string|max:255', // ✅ validasi kategori
        'description' => 'required|string',
        'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        'images.*' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
    ]);

    if ($request->hasFile('image')) {
        if (file_exists(public_path($portofolio->image))) {
            unlink(public_path($portofolio->image));
        }
        $image = $request->file('image');
        $imageName = time() . '_' . $image->getClientOriginalName();
        $image->move(public_path('portofolio_images'), $imageName);
        $portofolio->image = 'portofolio_images/' . $imageName;
    }

    $portofolio->title = $request->title;
    $portofolio->kategori = $request->kategori; // ✅ update kategori
    $portofolio->description = $request->description;
    $portofolio->save();

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

    $portofolio->load('additionalImages');
    if ($portofolio->pdf_path && file_exists(public_path($portofolio->pdf_path))) {
        unlink(public_path($portofolio->pdf_path));
    }

    $pdf = Pdf::loadView('admin.portofolio.pdf', compact('portofolio'));
    $pdfName = 'portofolio_' . time() . '.pdf';
    $pdf->save(public_path('portofolio_pdfs/' . $pdfName));

    $portofolio->update([
        'pdf_path' => 'portofolio_pdfs/' . $pdfName,
    ]);

    return redirect()->route('admin.portofolio.index')->with('success', 'Portofolio berhasil diperbarui.');
}

    public function destroy($id)
    {
        $portofolio = Portofolio::findOrFail($id);

        // Hapus gambar utama
        $imagePath = public_path($portofolio->image);
        if (file_exists($imagePath)) {
            unlink($imagePath);
        }

        // Hapus PDF jika ada
        if ($portofolio->pdf_path && file_exists(public_path($portofolio->pdf_path))) {
            unlink(public_path($portofolio->pdf_path));
        }

        // Hapus gambar tambahan
        foreach ($portofolio->additionalImages as $img) {
            $addImagePath = public_path($img->image);
            if (file_exists($addImagePath)) {
                unlink($addImagePath);
            }
            $img->delete();
        }

        $portofolio->delete();

        return redirect()->route('admin.portofolio.index')->with('success', 'Portofolio berhasil dihapus.');
    }

    public function showPortofolioPage()
    {
        $portofolios = Portofolio::latest()->get();
        return view('wikrama.portofolio', compact('portofolios'));
    }

    public function viewPdf($id)
    {
        $portofolio = Portofolio::with('additionalImages')->findOrFail($id);
        $pdf = Pdf::loadView('admin.portofolio.pdf', compact('portofolio'));
        return $pdf->stream('portofolio.pdf');
    }

    public function downloadPdf($id)
    {
        $portofolio = Portofolio::with('additionalImages')->findOrFail($id);
        $pdf = Pdf::loadView('admin.portofolio.pdf', compact('portofolio'));
        return $pdf->download('Portofolio-'.$id.'.pdf');
    }
}
