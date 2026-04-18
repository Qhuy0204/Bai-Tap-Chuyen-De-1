<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;
<<<<<<< HEAD
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
=======

Route::get('/students', [StudentController::class, 'index']);

Route::get('/students/create', [StudentController::class, 'create']);

Route::post('/students/store', [StudentController::class, 'store']);

Route::get('/students/edit/{id}', [StudentController::class, 'edit']);

Route::post('/students/update/{id}', [StudentController::class, 'update']);

Route::get('/students/delete/{id}', [StudentController::class, 'delete']);
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

Route::get('/', [StudentController::class,'index']);
>>>>>>> a82435391ceea19b1bb587b982fffff116369fd6
