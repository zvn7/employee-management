<?php

use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/dashboard', function () {
//     return view('employee.index');
// })->middleware(['auth', 'verified'])->name('dashboard');

// Route::middleware('auth')->group(function () {
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });



Route::get('/employee', [EmployeeController::class, 'index'])->name('employee.index');
Route::get('/employee/create', [EmployeeController::class, 'create'])->name('employee.create');
Route::post('/employee/create', [EmployeeController::class, 'store'])->name('employee.store');

Route::get('/employee/{id}', [EmployeeController::class, 'show'])->name('employee.show');

Route::get('/employee/{id}/edit', [EmployeeController::class, 'edit'])->name('employee.edit');

Route::put('/employee/{id}', [EmployeeController::class, 'update'])->name('employee.update');

Route::delete('/employee/{id}', [EmployeeController::class, 'destroy'])->name('employee.destroy');

Route::get('/', function () {
    return view('welcome');
});

// require __DIR__.'/auth.php';