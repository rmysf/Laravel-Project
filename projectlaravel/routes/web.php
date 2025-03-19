<?php

use Illuminate\Support\Facades\Route;
use Livewire\Volt\Volt;

// Halaman utama
Route::get('/', function () {
    return view('welcome');
})->name('home');

// Halaman home dengan link navigasi
Route::get('/home', function () {
    return "
    <div style='text-align: center;'>
        <h2>Selamat Datang di chikenstore</h2>
        <br><br>
        <a href='/Kategori'>Kategori</a>
        <br><br>
        <a href='/Produk-Terlaris'>Produk Terlaris</a>
        <br><br>
        <a href='/Promo'>Promo</a>
        <br><br>
        <a href='/Keranjang'>Keranjang Belanja</a>
        <br><br>
        <a href='/Checkout'>Checkout</a>
    </div>
    ";
});

// Halaman kategori
Route::get('/Kategori', function () {
    return 'Ini adalah halaman kategori produk';
});

// Halaman produk terlaris
Route::get('/Produk-Terlaris', function () {
    return 'Ini adalah halaman produk terlaris';
});

// Halaman promo
Route::get('/Promo', function () {
    return 'Ini adalah halaman promo';
});

// Halaman keranjang belanja
Route::get('/Keranjang', function () {
    return 'Ini adalah halaman keranjang belanja';
});

// Halaman checkout (memerlukan login)
Route::middleware(['auth'])->group(function () {
    Route::get('/Checkout', function () {
        return 'Ini adalah halaman checkout';
    });
});

// Dashboard dengan middleware auth dan verified
Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

// Group middleware untuk halaman settings
Route::middleware(['auth'])->group(function () {
    Route::redirect('settings', 'settings/profile');

    Volt::route('settings/profile', 'settings.profile')->name('settings.profile');
    Volt::route('settings/password', 'settings.password')->name('settings.password');
    Volt::route('settings/appearance', 'settings.appearance')->name('settings.appearance');
});

require __DIR__.'/auth.php';