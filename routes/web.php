<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\teamController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [PagesController::class, 'home'])->name('home');

Route::get('create', [teamController::class, 'create'])->name('create');

Route::post('store', [teamController::class, 'store'])->name('store');

Route::get('edit/{id}', [teamController::class, 'edit'])->middleware(['auth', 'verified'])->name('edit');

Route::post('update', [teamController::class, 'update'])->middleware(['auth', 'verified'])->name('update');

Route::get('delete/{id}', [teamController::class, 'delete'])->middleware(['auth', 'verified'])->name('delete');

Route::get('/dashboard', [PagesController::class, 'team'])->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
