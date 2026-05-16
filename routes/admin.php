<?php

use App\Http\Controllers\EmployeeController;
use Illuminate\Support\Facades\Route;

Route::get('/dashboard', function () {
  return view('admin.dashboard');
})->name('dashboard');

// Empleados
Route::resource('employees', EmployeeController::class);



?>