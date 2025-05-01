<?php

namespace App\Http\Controllers;

use App\Models\Home;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function edit()
    {
        // Ambil semua data Home, pastikan ada minimal 3 data (jika kurang tambahkan data kosong)
        $home = Home::all();
        while ($home->count() < 3) {
            $home->push((object)[
                'icon' => '',
                'title' => '',
                'description' => '',
            ]);
        }

        return view('admin.home.edit', compact('home'));
    }

    public function update(Request $request)
    {
        // Validasi data yang diterima
        $request->validate([
            'home.*.icon' => 'required|string',
            'home.*.title' => 'required|string|max:255',
            'home.*.description' => 'required|string',
        ]);

        // Proses update atau insert data
        foreach ($request->home as $index => $data) {
            // Jika ada ID, update data yang sudah ada
            if (isset($data['id'])) {
                $home = Home::find($data['id']);
                if ($home) {
                    $home->update([
                        'icon' => $data['icon'],
                        'title' => $data['title'],
                        'description' => $data['description'],
                    ]);
                }
            } else {
                // Jika tidak ada ID, buat data baru
                Home::create([
                    'icon' => $data['icon'],
                    'title' => $data['title'],
                    'description' => $data['description'],
                ]);
            }
        }

        return redirect()->back()->with('success', 'Konten home berhasil diperbarui.');
    }

    public function showHome()
    {
        // Menampilkan semua data home di halaman depan
        $homes = Home::all();
        return view('wikrama.index', compact('homes'));
    }
}
