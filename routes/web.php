<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\ContentController;
use App\Http\Controllers\PortofolioController;
use App\Http\Controllers\AuthController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('wikrama.index');
});
Route::get('/tentang', function () {
    return view('wikrama.tentang');
});
Route::get('/produk', function () {
    return view('wikrama.produk');
});
Route::get('/portofolio', function () {
    return view('wikrama.portofolio');
});
Route::get('/kontak', function () {
    return view('wikrama.kontak');
});


    // Dashboard
    Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('admin.dashboard');
    
    // Content Management
    Route::get('/dashboard/content', [ContentController::class, 'index'])->name('admin.content.index');
    Route::post('/dashboard/content', [ContentController::class, 'store'])->name('admin.addContent');
    Route::put('/dashboard/content/{id}', [ContentController::class, 'update'])->name('admin.updateContent');
    Route::delete('/dashboard/content/{id}', [ContentController::class, 'destroy'])->name('admin.deleteContent');
    Route::get('dashboard/content/create', [ContentController::class, 'create'])->name('admin.content.create');

    // Portofolio Management
    Route::get('/dashboard/portofolio', [PortofolioController::class, 'index'])->name('admin.portofolio.index');
    Route::get('/dashboard/portofolio/create', [PortofolioController::class, 'create'])->name('admin.portofolio.create');
    Route::post('/dashboard/portofolio', [PortofolioController::class, 'store'])->name('admin.addPortofolio');
    Route::delete('/dashboard/portofolio/{id}', [PortofolioController::class, 'destroy'])->name('admin.deletePortofolio');
    
    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

    Route::middleware(['auth', 'admin'])->group(function () {
        Route::get('/admin/dashboard', function () {
            return view('admin.dashboard');
        });
    });
