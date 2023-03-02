<?php

use Illuminate\Support\Facades\Route;
use App\Models\Patient;
use App\Models\Doctor;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\dashboard\Dashboardpatientcontroller;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::resource("/patient", PatientController::class);
Route::get('/patient', [PatientController::class, 'index']);
Route::get('/patient/create', [PatientController::class, 'create']);
Route::post('/patient', [PatientController::class, 'store']);
Route::get('/patient/{id}', [PatientController::class, 'show']);
Route::get('/patient/{id}/edit', [PatientController::class, 'edit']);
Route::post('/patient/{id}', [PatientController::class, 'update']);
Route::delete('/patient/{id}', [PatientController::class, 'destroy']);

Route::get('/dashboard/patients', [Dashboardpatientcontroller::class, 'index'])->name('dashboard.patients.index');
Route::get('/patients', [PatientController::class, 'index'])->name('patients.index');

Route::resource("/dashboard/patient", Dashboardpatientcontroller::class);
Route::get('/dashboard/patient', [Dashboardpatientcontroller::class, 'index']);
Route::get('/dashboard/patient/create', [Dashboardpatientcontroller::class, 'create']);
Route::post('/dashboard/patient', [Dashboardpatientcontroller::class, 'store']);
Route::get('/dashboard/patient/{id}', [Dashboardpatientcontroller::class, 'show']);
Route::get('/dashboard/patient/{id}/edit', [Dashboardpatientcontroller::class, 'edit']);
Route::post('/dashboard/patient/{id}', [Dashboardpatientcontroller::class, 'update']);
Route::delete('/dashboard/patient/{id}', [Dashboardpatientcontroller::class, 'destroy']);

Route::get('/dashboard/doctor', [Dashboardpatientcontroller::class, 'doctor']);

// Route::get('/dashboard/patients', [PatientController::class, 'index']);
// Route::get('/dashboard/patient', [Dashboardpatientcontroller::class, 'index'])->name('dashboard.patients.index');

Route::get('/doctor', [PatientController::class, 'doctor']);


// Route::group(['prefix' => 'patient'], function () {
//     Route::get('/', [PatientController::class, 'index']);
//     Route::get('/create', [PatientController::class, 'create']);
//     Route::post('/', [PatientController::class, 'store']);
//     Route::get('/{id}', [PatientController::class, 'show']);
//     Route::get('/{id}/edit', [PatientController::class, 'edit']);
//     Route::patch('/{id}', [PatientController::class, 'update']);
//     Route::delete('/{id}', [PatientController::class, 'destroy']);
// });

// Route::get('/dashboard', function () {
//     return view('dashboard.index');
// });

// Route::get('/login', function () {
//     return view('login.index');
// });

Route::group(['prefix' => '/login'], function() {
    Route::get('/all', [LoginController::class, 'index']);
    Route::post('/login', [LoginController::class, 'login']);
    Route::get('/logout', [LoginController::class, 'logout']);
});

// Route::get('/login', [LoginController:: class, 'index'])->name('login')->middleware('guest');
// Route::post('/login', [LoginController:: class, 'auth']);
// Route::get('/logout', [LoginController:: class, 'logout']);

route::group(['prefix' => '/register'], function () {
    Route::get('/all', [RegisterController::class, 'index']);
    Route::post('/create', [RegisterController::class, 'create']);
});

Route::group(["prefix" => "/dashboard"], function(){
    Route::get("/dashboard", function(){
        return view("dashboard.index");
    })->middleware('auth');
});

Route::get('/dashboard', function () {
    return view('dashboard.index');
});