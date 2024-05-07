<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\DebugController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminVehiclesController;
use App\Http\Controllers\AdminPartsController;
use Illuminate\Support\Facades\Route;


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

Route::get('/', function () {
    return view('frontend/index');
});

Route::get('/debug', [DebugController::class, 'index'])->name('debug');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// admin middleware
Route::middleware('auth','role:admin')->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'AdminDashboard'])->name('admin.dashboard');
    Route::get('/admin/vehicles', [AdminVehiclesController::class, 'index'])->name('admin.vehicles');
    Route::get('/admin/vehicles/edit/{id?}', [AdminVehiclesController::class, 'edit'])->name('admin.vehicles.edit');
    Route::post('/admin/vehicles/edit/{id?}', [AdminVehiclesController::class, 'upsert']);
    Route::get('/admin/vehicles/delete/{id}', [AdminVehiclesController::class, 'delete']);
    Route::get('/admin/parts', [AdminPartsController::class, 'index'])->name('admin.parts');
    Route::get('/admin/parts/editParts/{id?}', [AdminPartsController::class, 'edit'])->name('admin.parts.editParts');
    Route::post('/admin/parts/editParts/{id?}', [AdminPartsController::class, 'upsert']);
    Route::get('/admin/parts/deleteParts/{id}', [AdminPartsController::class, 'delete']);
});

// user middleware
Route::middleware('auth','role:user')->group(function () {
    Route::get('/user', [UserController::class, 'UserIndex'])->name('user.index');
});




require __DIR__.'/auth.php';
