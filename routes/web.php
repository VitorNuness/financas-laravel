<?php

use App\Http\Controllers\ItensController;
use App\Http\Controllers\ProfileController;
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
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Display a list of itens
    Route::get('/itens', [ItensController::class, 'index'])->name('itens.index');

    // Display a create form
    Route::get('/itens/create', [ItensController::class, 'create'])->name('itens.create');

    // Store a new item
    Route::post('/itens', [ItensController::class, 'store'])->name('itens.store');

    // Display a specific item
    Route::get('/itens/{item}', [ItensController::class, 'show'])->name('itens.show');

    // Display a specific item to edit
    Route::get('itens/{item}/edit', [ItensController::class, 'edit'])->name('itens.edit');

    // Update a specific item
    Route::get('itens/{item}', [ItensController::class, 'update'])->name('itens.update');

    // Delete a specific item
    Route::delete('itens/{item}', [ItensController::class, 'destroy'])->name('itens.destroy');
});

require __DIR__.'/auth.php';
