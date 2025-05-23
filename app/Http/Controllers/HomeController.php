<?php

namespace App\Http\Controllers;

use App\Models\Home;
use App\Models\Portofolio;
use App\Models\Produk;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function edit()
    {
        $home = Home::all();
        return view('admin.home.edit', compact('home'));        
    }
    public function update(Request $request)
    {
        foreach ($request->home as $item) {
            $home = Home::find($item['id']);
            $home->title = $item['title'];
            $home->description = $item['description'];
    
            if (isset($item['image']) && $request->hasFile("home.{$loop->index}.image")) {
                $file = $request->file("home.{$loop->index}.image");
                $path = $file->store('home_images', 'public');
                $home->image = $path;
            }
    
            $home->save();
        }
    
        return back()->with('success', 'Konten berhasil diperbarui!');
    }    
    public function showHome()
    {
        $homes = Home::all();
        $portofolios = Portofolio::latest()->get();
        $produks = Produk::latest()->get();
    
        return view('wikrama.index', compact('homes', 'portofolios', 'produks'));
    }
    public function updateSingle(Request $request, $id)
    {
        $home = Home::findOrFail($id);

        $home->title = $request->title;
        $home->description = $request->description;

        if ($request->hasFile('image')) {
            $image = $request->file('image')->store('home', 'public');
            $home->image = $image;
        }

        $home->save();

        return redirect()->back()->with('success', 'Konten berhasil diperbarui.');
    }

}
