<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Kontak;

class KontakController extends Controller
{
    public function edit()
    {
        $kontak = Kontak::first();

        if (!$kontak) {
            // Buat default jika belum ada
            $kontak = Kontak::create([
                'telepon' => '',
                'email' => '',
                'alamat' => '',
            ]);
        }

        return view('admin.kontak.edit', compact('kontak'));
    }
    public function update(Request $request)
    {
        $kontak = Kontak::first();
    
        if (!$kontak) {
            $kontak = Kontak::create($request->only(['telepon', 'email', 'alamat']));
        } else {
            $kontak->update($request->only(['telepon', 'email', 'alamat']));
        }
    
        return redirect()->back()->with('success', 'Kontak berhasil diperbarui.');
    }    
    public function kirimPesan(Request $request)
    {
        \App\Models\Pesan::create($request->only(['name', 'email', 'message']));
        return back()->with('success', 'Pesan berhasil dikirim!');
    }
    public function lihatPesan()
    {
        $pesans = \App\Models\Pesan::latest()->get();
        return view('admin.kontak.pesan', compact('pesans'));
    }


}
