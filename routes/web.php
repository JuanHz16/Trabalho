<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\EnrollmentController;
Route::get('/', fn()=>redirect()->route('dashboard'));
Route::middleware('auth')->group(function(){ Route::get('/dashboard',[DashboardController::class,'index'])->name('dashboard'); Route::resource('students',StudentController::class); Route::get('/courses',[CourseController::class,'index'])->name('courses.index'); Route::post('/courses',[CourseController::class,'store'])->middleware('role:admin,secretaria')->name('courses.store'); Route::resource('enrollments',EnrollmentController::class)->only(['index','create','store']); });
require __DIR__.'/auth.php';
