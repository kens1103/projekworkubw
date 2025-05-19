<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Content;
use App\Models\Portofolio;

class AdminDashboardController extends Controller
{
    public function index()
    {
        $contents = Content::all();
        $portofolios = Portofolio::all();

        return view('admin.dashboard', compact('contents', 'portofolios'));
    }
}
