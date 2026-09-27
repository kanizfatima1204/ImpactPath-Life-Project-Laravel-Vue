<?php
use App\Http\Controllers\ImpactController;
use Illuminate\Support\Facades\Route;

Route::get('/', [ImpactController::class, 'home'])->name('home');
Route::post('/login', [ImpactController::class, 'login'])->name('login');
Route::middleware('auth')->group(function () {
    Route::post('/logout', [ImpactController::class, 'logout'])->name('logout');
    Route::get('/dashboard', [ImpactController::class, 'dashboard'])->name('dashboard');
    Route::get('/research', [ImpactController::class, 'research'])->name('research');
    Route::post('/research', [ImpactController::class, 'storeResearch'])->name('research.store');
    Route::put('/research/{researchItem}', [ImpactController::class, 'updateResearch'])->name('research.update');
    Route::delete('/research/{researchItem}', [ImpactController::class, 'destroyResearch'])->name('research.destroy');
    Route::get('/prototype', [ImpactController::class, 'prototype'])->name('prototype');
    Route::post('/prototype/feedback', [ImpactController::class, 'storeFeedback'])->name('feedback.store');
    Route::get('/results', [ImpactController::class, 'results'])->name('results');
    Route::post('/results/test', [ImpactController::class, 'storeTest'])->name('results.test');
    Route::get('/future-plan', [ImpactController::class, 'futurePlan'])->name('future.plan');
});
