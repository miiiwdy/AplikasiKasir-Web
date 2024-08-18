<?php

use App\Http\Middleware\Petugas;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\PetugasController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\AdminHomeController;
use App\Http\Controllers\PetugasHomeController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\SuperAdminHomeController;
use App\Http\Controllers\KonfirmRegistrasiController;

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
    Route::get('/listbarang', [PetugasHomeController::class, 'listbarang_petugas'])->name('listbarang_petugas');
    Route::get('/pendataanbarang', [PetugasHomeController::class, 'pendataanbarang_petugas'])->name('pendataanbarang_petugas');
    Route::post('/checkout', [CheckoutController::class, 'store'])->name('checkout.store');
    Route::get('/receipt', [CheckoutController::class, 'showReceipt'])->name('checkout.receipt');
    Route::get('/histori', [PetugasHomeController::class, 'histori_petugas'])->name('histori_petugas');
    Route::get('/checkout/bill', [CheckoutController::class, 'showBill'])->name('checkout.bill');
    Route::post('/checkout/clear', [CheckoutController::class, 'clearBill'])->name('checkout.clear');

});

Route::prefix('admin')->middleware('auth','admin')->group(function() {
    Route::get('/listbarang', [AdminHomeController::class, 'listbarang_admin'])->name('listbarang_admin');
    Route::get('/pendataanbarang', [AdminHomeController::class, 'pendataanbarang_admin'])->name('pendataanbarang_admin');
    Route::get('/histori', [AdminHomeController::class, 'histori_admin'])->name('histori_admin');
    Route::get('/petugasmanager', [AdminHomeController::class, 'petugasmanager_admin'])->name('petugasmanager_admin');
});

Route::prefix('superadmin')->middleware('auth', 'superadmin')->group(function() {
    Route::get('/listbarang', [SuperAdminHomeController::class, 'listbarang_superadmin'])->name('listbarang_superadmin');
    Route::get('/pendataanbarang', [SuperAdminHomeController::class, 'pendataanbarang_superadmin'])->name('pendataanbarang_superadmin');
    Route::get('/histori', [SuperAdminHomeController::class, 'histori_superadmin'])->name('histori_superadmin');
    Route::get('/petugasmanager', [SuperAdminHomeController::class, 'petugasmanager_superadmin'])->name('petugasmanager_superadmin');
    Route::get('/pending', [KonfirmRegistrasiController::class, 'showPendingUsers'])->name('superadmin.pending');
    Route::post('/confirm/{id}', [KonfirmRegistrasiController::class, 'confirmUser'])->name('superadmin.confirm');
    Route::delete('/delete/{id}', [KonfirmRegistrasiController::class, 'deleteUser'])->name('superadmin.delete');
});

Route::resource('petugas', PetugasController::class);
Route::resource('barangs', BarangController::class);
