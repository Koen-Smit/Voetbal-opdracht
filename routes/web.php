<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\teamController;
use App\Http\Controllers\userController;

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

Route::get('toernooi', [PagesController::class, 'toernooi'])->name('toernooi');

Route::get('create', [teamController::class, 'create'])->name('create');

Route::post('store', [teamController::class, 'store'])->name('store');

Route::get('edit/{id}', [teamController::class, 'edit'])->middleware(['auth', 'verified'])->name('edit');

Route::get('addTeamMate/{id}', [teamController::class, 'addTeamMate'])->middleware(['auth', 'verified'])->name('addTeamMate');

//post route for add player to database
Route::POST('addPlayer', [teamController::class, 'addPlayer'])->middleware(['auth', 'verified'])->name('addPlayer');

Route::post('update', [teamController::class, 'update'])->middleware(['auth', 'verified'])->name('update');

Route::get('admin', [userController::class, 'admin'])->middleware(['auth', 'verified'])->name('admin');
Route::get('adminUpdate/{id}', [userController::class, 'adminUpdate'])->middleware(['auth', 'verified'])->name('adminUpdate');

Route::delete('delete/{id}', [teamController::class, 'delete'])->name('delete');

Route::get('/dashboard', [PagesController::class, 'team'])->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
