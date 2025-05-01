<?php

namespace App\Http\Controllers;

use App\Models\Home;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function edit()
{
    // Ambil semua data home (pastikan ada 3 bagian atau lebih)
    $homes = Home::all();  // Ambil data homes
    return view('admin.home.edit', compact('homes'));  // Kirim data homes ke view
}

    public function update(Request $request)
    {
        // Pastikan request homes memiliki struktur seperti homes[0], homes[1], homes[2]
        foreach ($request->homes as $index => $homeData) {
            $home = Home::find($homeData['id']);
            $home->icon = $homeData['icon'];
            $home->title = $homeData['title'];
            $home->description = $homeData['description'];
            $home->save();
        }

        return redirect()->back()->with('success', 'Data home berhasil diperbarui!');
    }

    public function showHome()
    {
        $homes = Home::all();
        return view('wikrama.index', compact('homes'));
    }
}
