<?php

use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use Laravel\Fortify\Features;
use App\Http\Controllers\ProductController;
Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canRegister' => Features::enabled(Features::registration()),
    ]);
})->name('home');

Route::get('dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('products', [ProductController::class, 'Index'])->name('products.Index');
    Route::get('products/create', [ProductController::class, 'Create'])->name('products.Create');
    Route::post('products', [ProductController::class, 'store'])->name('products.store');
});
require __DIR__.'/settings.php';
