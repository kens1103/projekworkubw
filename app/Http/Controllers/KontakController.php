<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kontak;

class KontakController extends Controller
{
    public function index()
    {
        $kontak = Kontak::first();

        if (!$kontak) {
            $kontak = Kontak::create([
                'telepon' => '',
                'email' => '',
                'alamat' => '',
            ]);
        }

        return view('wikrama.kontak', compact('kontak'));
    }

    public function kirimPesan(Request $request)
    {
        \App\Models\Pesan::create($request->only(['name', 'email', 'message']));
        return back()->with('success', 'Pesan berhasil dikirim!');
    }
    public function show()
    {
        $kontak = Kontak::first();
        return view('wikrama.kontak', compact('kontak'));
    }
}
