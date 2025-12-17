<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;

// PUBLIC
use App\Http\Controllers\PublicUpitController;

// ADMIN
use App\Http\Controllers\Admin\UpitiController as AdminUpitiController;
use App\Http\Controllers\Admin\ZadaciController as AdminZadaciController;
use App\Http\Controllers\Admin\MolbaController as AdminMolbaController;

// MONTAŽER
use App\Http\Controllers\Montazer\ZadaciController as MontazerZadaciController;



Route::get('/', [PublicUpitController::class, 'create'])->name('public.home');
Route::post('/upit', [PublicUpitController::class, 'store'])->name('public.upit.store');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});



Route::middleware(['auth', 'role:ADMIN'])
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {

      
        Route::get('/upiti', [AdminUpitiController::class, 'index'])
            ->name('upiti.index');

        Route::get('/upiti/{upit}/edit', [AdminUpitiController::class, 'edit'])
            ->name('upiti.edit');

        Route::put('/upiti/{upit}', [AdminUpitiController::class, 'update'])
            ->name('upiti.update');

        Route::post('/upiti/{upit}/obrisi', [AdminUpitiController::class, 'obrisi'])
            ->name('upiti.obrisi');

        Route::patch('/upiti/{upit}/status', [AdminUpitiController::class, 'status'])
            ->name('upiti.status');


      
        Route::get('/zadaci', [AdminZadaciController::class, 'index'])
            ->name('zadaci.index');

        Route::get('/zadaci/kreiraj', [AdminZadaciController::class, 'create'])
            ->name('zadaci.create');

        Route::post('/zadaci', [AdminZadaciController::class, 'store'])
            ->name('zadaci.store');

        Route::get('/zadaci/{zadatak}/edit', [AdminZadaciController::class, 'edit'])
            ->name('zadaci.edit');

        Route::put('/zadaci/{zadatak}', [AdminZadaciController::class, 'update'])
            ->name('zadaci.update');

       
        Route::delete('/zadaci/{zadatak}', [AdminZadaciController::class, 'destroy'])
            ->name('zadaci.destroy');



        Route::get('/molbe', [AdminMolbaController::class, 'index'])
            ->name('molbe.index');

        Route::post('/molbe/{poruka}/odgovori', [AdminMolbaController::class, 'reply'])
            ->name('molbe.odgovori');
            
            
    });


Route::middleware(['auth', 'role:MONTAZER'])
    ->prefix('montazer')
    ->name('montazer.')
    ->group(function () {

        Route::get('/zadaci', [MontazerZadaciController::class, 'index'])
            ->name('zadaci.index');

        Route::get('/zadaci/{zadatak}', [MontazerZadaciController::class, 'show'])
            ->name('zadaci.show');

        Route::post('/zadaci/{zadatak}/status', [MontazerZadaciController::class, 'status'])
            ->name('zadaci.status');

        Route::post('/zadaci/{zadatak}/molba', [MontazerZadaciController::class, 'sendMolba'])
            ->name('zadaci.molba');

        Route::post('/zadaci/{zadatak}/slika', [MontazerZadaciController::class, 'uploadSlika'])
            ->name('zadaci.slika');
    });

require __DIR__.'/auth.php';
