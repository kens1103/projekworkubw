<?php

use App\Http\Controllers\AboutController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\Admin\HomeController as AdminHomeController;
use App\Http\Controllers\ContentController;
use App\Http\Controllers\PortofolioController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Admin\KontakController as AdminKontakController;
use App\Http\Controllers\KontakController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\ProdukController;
use App\Models\Produk;


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

Route::get('/produk', function () {
    $produks = \App\Models\Produk::all();
    return view('wikrama.produk', compact('produks'));
})->name('produk.index');

Route::get('/portofolio', function () {
    return view('wikrama.portofolio');
});
Route::get('/kontak', function () {
    return view('wikrama.kontak');
});


    // Dashboard
    Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('admin.dashboard');
    Route::get('/', [HomeController::class, 'showHome'])->name('home.index');
    
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
    Route::get('/dashboard/portofolio/{id}/edit', [PortofolioController::class, 'edit'])->name('admin.portofolio.edit');
    Route::put('/dashboard/portofolio/{id}', [PortofolioController::class, 'update'])->name('admin.portofolio.update');
    Route::delete('/dashboard/portofolio/{id}', [PortofolioController::class, 'destroy'])->name('admin.deletePortofolio');

    Route::get('/kontak', [KontakController::class, 'show'])->name('kontak.show');
    Route::get('/kontak', [KontakController::class, 'index'])->name('kontak');
    Route::post('/kontak/kirim', [KontakController::class, 'kirimPesan'])->name('kontak.kirim');
    
    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

    Route::middleware(['auth', 'admin'])->group(function () {
        Route::get('/admin/dashboard', function () {
            return view('admin.dashboard');
        });
    
        Route::get('/admin/home/edit', [HomeController::class, 'edit'])->name('admin.home.edit');
        Route::post('/admin/home/update', [HomeController::class, 'update'])->name('admin.home.update');
        Route::put('/admin/home/update-single/{id}', [HomeController::class, 'updateSingle'])->name('admin.home.update.single');

        Route::get('/kontak/edit', [AdminKontakController::class, 'edit'])->name('admin.kontak.edit');
        Route::put('/kontak/update', [AdminKontakController::class, 'update'])->name('admin.kontak.update');
        Route::delete('/admin/pesan/{id}', [AdminKontakController::class, 'destroy'])->name('pesan.destroy');
        Route::get('/admin/kontak/pesan', [AdminKontakController::class, 'lihatPesan'])->name('admin.kontak.pesan');

        Route::get('/portofolio', [PortofolioController::class, 'index'])->name('admin.portofolio.index');
Route::post('/portofolio', [PortofolioController::class, 'store'])->name('admin.portofolio.store');
Route::get('/portofolio/{id}/edit', [PortofolioController::class, 'edit'])->name('admin.portofolio.edit');
Route::put('/portofolio/{id}', [PortofolioController::class, 'update'])->name('admin.portofolio.update');
Route::delete('/portofolio/{id}', [PortofolioController::class, 'destroy'])->name('admin.portofolio.destroy');

        Route::get('/admin/produk', [ProdukController::class, 'index'])->name('admin.produk.index');
        Route::get('/admin/produk/create', [ProdukController::class, 'create'])->name('admin.produk.create');
        Route::post('/admin/produk', [ProdukController::class, 'store'])->name('admin.produk.store');
        Route::get('/admin/produk/{id}/edit', [ProdukController::class, 'edit'])->name('admin.produk.edit');
        Route::put('/admin/produk/{id}', [ProdukController::class, 'update'])->name('admin.produk.update');
        Route::delete('/admin/produk/{id}', [ProdukController::class, 'destroy'])->name('admin.produk.destroy');
    });

    Route::get('/portofolio', [PortofolioController::class, 'showPortofolioPage'])->name('portofolio.page');
    Route::get('/index', [AboutController::class, 'showHome'])->name('home.show');
    Route::get('/tentang', [AboutController::class, 'showAbout'])->name('about.show');
    Route::get('/admin/about/edit', [AboutController::class, 'edit'])->name('admin.about.edit');
    Route::put('/admin/about/update', [AboutController::class, 'update'])->name('about.update');
    Route::get('/admin/portofolio/view-pdf/{id}', [PortofolioController::class, 'viewPdf'])->name('admin.portofolio.viewPdf');
    Route::get('admin/portofolio/download/{id}', [PortofolioController::class, 'downloadPdf'])->name('admin.portofolio.downloadPdf');
