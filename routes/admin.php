<?php

use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\ServiceController;
use Illuminate\Support\Facades\Route;

Route::get('/dashboard', function () {
  return view('admin.dashboard');
})->name('dashboard');

// Employees
Route::resource('employees', EmployeeController::class);

// Clients
Route::resource('clients', ClientController::class);

// Services
Route::resource('services', ServiceController::class);

// Appointments
Route::resource('appointments', AppointmentController::class);
?>