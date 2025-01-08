<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AgentController;
use App\Http\Controllers\TicketController;
use Illuminate\Support\Facades\Route;

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

    Route::get('/dashboard', [TicketController::class, 'index'])->name('dashboard');
    // Route::get('tickets', [TicketController::class, 'index'])->name('tickets.index');
    // Route::get('tickets/{id}', [TicketController::class, 'show'])->name('tickets.show');
    // Route::get('tickets/create', [TicketController::class, 'create'])->name('tickets.create');
    // Route::post('tickets', [TicketController::class, 'store'])->name('tickets.store');
});

Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('admin/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
    Route::resource('tickets', AdminController::class);
});

Route::middleware(['auth', 'agent'])->group(function () {
    Route::get('agent/dashboard', [AgentController::class, 'index'])->name('agent.dashboard');
    // Route::get('agent/tickets', [AgentController::class, 'index'])->name('tickets.index');
    // Route::get('agent/tickets/{id}', [AgentController::class, 'show'])->name('tickets.show');
    // Route::get('agent/tickets/create', [AgentController::class, 'create'])->name('tickets.create');
    // Route::post('agent/tickets', [AgentController::class, 'store'])->name('tickets.store');
});

require __DIR__.'/auth.php';
