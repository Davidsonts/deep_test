<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Auth\LockScreenController;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\CheckInactivity;

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
    // Rotas para a tela de bloqueio
    Route::get('/lock-screen', [LockScreenController::class, 'show'])->name('lock-screen')->withoutMiddleware([CheckInactivity::class]); 
    Route::post('/unlock', [LockScreenController::class, 'unlock'])->name('unlock')->withoutMiddleware([CheckInactivity::class]);
});

require __DIR__.'/auth.php';
