<?php

use Illuminate\Support\Facades\Route;
use Livewire\Volt\Volt;

// // Halaman utama
// Route::get('/', function () {
//     return view('web.homepage');
// });

// // Halaman home dengan link navigasi
// Route::get('/home', function () {
//     return "
//     <div style='text-align: center;'>
//         <h2>Selamat Datang di chikenstore</h2>
//         <br><br>
//         <a href='/Kategori'>Kategori</a>
//         <br><br>
//         <a href='/Produk-Terlaris'>Produk Terlaris</a>
//         <br><br>
//         <a href='/Promo'>Promo</a>
//         <br><br>
//         <a href='/Keranjang'>Keranjang Belanja</a>
//         <br><br>
//         <a href='/Checkout'>Checkout</a>
//     </div>
//     ";
// });

// // Halaman kategori
// Route::get('/Kategori', function () {
//     return 'Ini adalah halaman kategori produk';
// });

// // Halaman produk terlaris
// Route::get('/Produk-Terlaris', function () {
//     return 'Ini adalah halaman produk terlaris';
// });

// // Halaman promo
// Route::get('/Promo', function () {
//     return 'Ini adalah halaman promo';
// });

// // Halaman keranjang belanja
// Route::get('/Keranjang', function () {
//     return 'Ini adalah halaman keranjang belanja';
// });

// // Halaman checkout (memerlukan login)
// Route::middleware(['auth'])->group(function () {
//     Route::get('/Checkout', function () {
//         return 'Ini adalah halaman checkout';
//     });
// });

// // Dashboard dengan middleware auth dan verified
// Route::view('dashboard', 'dashboard')
//     ->middleware(['auth', 'verified'])
//     ->name('dashboard');

// // Group middleware untuk halaman settings
// Route::middleware(['auth'])->group(function () {
//     Route::redirect('settings', 'settings/profile');

//     Volt::route('settings/profile', 'settings.profile')->name('settings.profile');
//     Volt::route('settings/password', 'settings.password')->name('settings.password');
//     Volt::route('settings/appearance', 'settings.appearance')->name('settings.appearance');
// });

// require __DIR__.'/auth.php';

Route::get('/', function() {
    return view('web.homepage'); // Halaman utama
});

// Rute untuk halaman Products
Route::get('product', function() {
    return view('web.product'); // Halaman produk
});

// Rute untuk halaman produk individual berdasarkan slug
Route::get('product/{slug}', function($slug) {
    return "halaman single product - ".$slug;
});

// Rute untuk halaman Categories
Route::get('categories', function() {
    return view('web.categories'); // Halaman kategori produk
});

// Rute untuk halaman kategori individual berdasarkan slug
Route::get('category/{slug}', function($slug) {
    return "halaman single category - ".$slug;
});

// Rute untuk halaman Cart
Route::get('cart', function() {
    return "halaman cart";
});

// Rute untuk halaman Checkout
Route::get('checkout', function() {
    return "halaman checkout";
});

// Rute untuk halaman dashboard, hanya untuk pengguna yang terautentikasi
Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

// Grup middleware untuk pengaturan terkait pengguna yang terautentikasi
Route::middleware(['auth'])->group(function () {
    Route::redirect('settings', 'settings/profile'); // Redirect ke halaman profil

    Volt::route('settings/profile', 'settings.profile')->name('settings.profile');
    Volt::route('settings/password', 'settings.password')->name('settings.password');
    Volt::route('settings/appearance', 'settings.appearance')->name('settings.appearance');
});

require __DIR__.'/auth.php'; // Memuat rute otentikasi 