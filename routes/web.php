<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\EnrollmentController;
use App\Http\Controllers\OrderController;

// Student
Route::get('/students', [StudentController::class, 'index'])->name('students.index');
Route::post('/students', [StudentController::class, 'store']);

// Product
Route::get('/products', [ProductController::class, 'index'])->name('products.index');
Route::post('/products', [ProductController::class, 'store']);
Route::post('/products/update/{id}', [ProductController::class, 'update']);
Route::get('/products/delete/{id}', [ProductController::class, 'destroy']);


//enrollment
Route::get('/enrollments', [EnrollmentController::class, 'index'])->name('enrollments.index');
Route::post('/enrollments', [EnrollmentController::class, 'store'])->name('enrollments.store');


//order
Route::get('/orders', [OrderController::class, 'index'])->name('orders.index');
Route::post('/orders', [OrderController::class, 'store']);
Route::get('/orders/{id}', [OrderController::class, 'show']);
Route::get('/orders/status/{id}/{status}', [OrderController::class, 'updateStatus']);