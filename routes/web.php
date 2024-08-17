<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\ProfileController;


Route::get('/', function () {
    return redirect('/login');
});

Route::get('/dashboard', function () {
    $user = Auth::user();

    switch ($user->role) {
        case 'admin':
            return redirect('/admin/listbarang');
        case 'superadmin':
            return redirect('/superadmin/listbarang');
        case 'petugas':
            return redirect('/petugas/listbarang');
        default:
            return redirect('/user/listbarang'); 
    }
})->middleware(['auth', 'verified'])->name('dashboard');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';


Route::prefix('petugas')->middleware('auth','petugas')->group(function() {
    Route::get('/listbarang', [HomeController::class, 'listbarang'])->name('listbarang');
    Route::get('/pendataanbarang', [HomeController::class, 'pendataanbarang'])->name('pendataanbarang');
});

Route::prefix('admin')->middleware('auth','admin')->group(function() {
    Route::get('/dashboard', [HomeController::class, 'indexadmin'])->name('dashboard_admin');
});

Route::prefix('superadmin')->middleware('auth','superadmin')->group(function() {
    Route::get('/dashboard', [HomeController::class, 'indexsuperadmin'])->name('dashboard_superadmin');
});

Route::resource('barangs', BarangController::class);