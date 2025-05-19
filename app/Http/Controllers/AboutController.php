<?php

namespace App\Http\Controllers;

use App\Models\About;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function edit()
    {
        $about = About::first(); 
        return view('admin.about.edit', compact('about'));
    }
    public function update(Request $request)
    {

        $about = About::first(); 
        $about->update([
            'title' => $request->input('title'),
            'visi' => $request->input('visi'),
            'misi' => $request->input('misi'),
        ]);

        return redirect()->back()->with('success', 'Data berhasil diupdate!');
    }
    public function showAbout()
    {
        $about = About::first(); 
        return view('wikrama/tentang', compact('about'));

    }
}