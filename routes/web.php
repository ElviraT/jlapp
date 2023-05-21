<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ClientesController;
use App\Http\Controllers\FarmaciaController;
use App\Http\Controllers\MedicoController;
use App\Http\Controllers\DashboardController;
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


Route::middleware(['auth', 'permission'])->group(function () {
    Route::get('/dashboard',[DashboardController::class, 'index'])->name('dashboard');
    // perfil
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // clientes
    Route::get('/cliente', [ClientesController::class, 'index'])->name('cliente.index');
    Route::post('/cliente/store', [ClientesController::class, 'store'])->name('cliente.store');

    // farmacia
    Route::get('/farmacia', [FarmaciaController::class, 'index'])->name('farmacia.index');
    Route::post('/farmacia/store', [FarmaciaController::class, 'store'])->name('farmacia.store');

    // medico
    Route::get('/medico', [MedicoController::class, 'index'])->name('medico.index');
    Route::post('/medico/store', [MedicoController::class, 'store'])->name('medico.store');

    // cambio de rol
    Route::get('/cambio-rol/{rol}', [DashboardController::class, 'rol']);
});

require __DIR__ . '/auth.php';