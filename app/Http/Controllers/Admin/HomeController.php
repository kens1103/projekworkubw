<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Home;

class HomeController extends Controller
{
    public function edit()
    {
        $home = Home::first(); // Asumsikan hanya satu record
        return view('admin.home.edit', compact('home'));
    }

    public function update(Request $request)
    {
        $home = Home::first();
        $home->title = $request->title;
        $home->description = $request->description;

        if ($request->hasFile('image')) {
            $home->image = $request->file('image')->store('home');
        }

        $home->save();

        return redirect()->route('admin.home.edit')->with('success', 'Berhasil diperbarui');
    }
}