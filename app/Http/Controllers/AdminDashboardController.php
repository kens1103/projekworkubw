<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Content;
use App\Models\Portofolio;

class AdminDashboardController extends Controller
{
    public function index()
    {
        // Ambil semua konten untuk Inovatif, Kolaboratif, dan Global Mindset
        $contents = Content::all();
        // Ambil semua portofolio
        $portofolios = Portofolio::all();

        return view('admin.dashboard', compact('contents', 'portofolios'));
    }
}
