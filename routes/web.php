<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\FarmaciaController;
use App\Http\Controllers\MedicoController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\PDFController;
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


Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::get('/producto-categoria/{categoria}', [ProductsController::class, 'index'])->name('buscar.categoria');

    // perfil
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // farmacia
    Route::get('/farmacia', [FarmaciaController::class, 'index'])->name('farmacia.index');
    Route::post('/farmacia/store', [FarmaciaController::class, 'store'])->name('farmacia.store');
    Route::get('/actividad_log', [FarmaciaController::class, 'activity'])->name('farmacia.activity');
    Route::post('/actividad_log/add', [FarmaciaController::class, 'activity_store'])->name('farmacia.actividad.store');

    // medico
    Route::get('/medico', [MedicoController::class, 'index'])->name('medico.index');
    Route::post('/medico/store', [MedicoController::class, 'store'])->name('medico.store');
    Route::get('/actividad', [MedicoController::class, 'activity'])->name('medico.activity');
    Route::post('/actividad/add', [MedicoController::class, 'activity_store'])->name('actividad.store');

    // cambio de rol
    Route::get('/cambio-rol/{rol}', [DashboardController::class, 'rol'])->name('cambio.rol');

    Route::get('markAsRead', function () {
        auth()->user()->unreadNotifications->markAsRead();
        return redirect()->back();
    })->name('markAsRead');

    Route::get('pdf/{id}', [PDFController::class, 'index'])->name('genera.pdf');
});

require __DIR__ . '/auth.php';
