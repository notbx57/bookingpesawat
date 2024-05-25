<?php

use App\Http\Controllers\AdminPanel\AdminController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserPanel\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FlightSearchController;

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
    return view('frontpage');
});

Route::get('/dashboard', [UserController::class, 'dashboard'])->middleware(['auth', 'verified'])->name('dashboard');



Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/tujuan', function () {
        return view('tujuan');
    });
});

require __DIR__ . '/auth.php';

Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('admin/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
    Route::get('admin/add-flight', [AdminController::class, 'create'])->name('admin.flights.create');
    Route::post('admin/add-flight', [AdminController::class, 'store'])->name('admin.flights.store');
    Route::get('admin/edit-flight/{flight}', [AdminController::class, 'edit'])->name('admin.flights.edit');
    Route::put('admin/edit-flight/{flight}', [AdminController::class, 'update'])->name('admin.flights.update');
    Route::delete('admin/delete-flight/{flight}', [AdminController::class, 'destroy'])->name('admin.flights.destroy');
});




Route::get('/promo', function () {
    return view('promo');
});

Route::get('/tim', function () {
    return view('tim');
});
