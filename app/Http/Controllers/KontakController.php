<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\PesanTerkirimMail;
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
        $validated = $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'message' => 'required',
        ]);

        // Simpan ke database
        \App\Models\Pesan::create($validated);

        // Kirim email ke user
        Mail::to($validated['email'])->queue(new PesanTerkirimMail($validated['name']));

        return back()->with('success', 'Pesan berhasil dikirim!');
    }
    public function show()
    {
        $kontak = Kontak::first();
        return view('wikrama.kontak', compact('kontak'));
    }
}
