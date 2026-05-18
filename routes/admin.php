<?php

use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\ClientController;
use Illuminate\Support\Facades\Route;

Route::get('/dashboard', function () {
  return view('admin.dashboard');
})->name('dashboard');

// Empleados
Route::resource('employees', EmployeeController::class);

// Clientes
Route::resource('clients', ClientController::class);



?>