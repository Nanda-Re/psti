<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\produkController;
use Illuminate\Support\Facades\Route;

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
    return view('index');
});


Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
});


// Route::get('/dashboard', function () {

//     return view('admin.dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/produk', [produkController::class, 'index'])->name('admin.produk');
    Route::get('/products/create', [produkController::class, 'create'])->name('produk.create');
    Route::Post('/products/store', [produkController::class, 'store'])->name('produk.store');
    Route::delete('/products/{item}', [produkController::class, 'destroy'])->name('produk.destroy');    
    Route::get('/products/{product}/edit', [produkController::class, 'edit'])->name('produk.edit');
});

require __DIR__ . '/auth.php';
