<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\DebugController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminVehiclesController;
use App\Http\Controllers\AdminPartsController;
use App\Http\Controllers\AdminOffersController;
use App\Http\Controllers\AdminWorksheetsController;
use App\Http\Controllers\AdminInvoicesController;
use App\Http\Controllers\AdminPartnersController;
use App\Http\Controllers\UserVehiclesController;
use App\Http\Controllers\UserOffersController;
use App\Http\Controllers\UserInvoicesController;
use App\Http\Controllers\AdminDashboardController;
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
    //Route::get('/admin/dashboard', [AdminController::class, 'AdminDashboard'])->name('admin.dashboard');
    Route::get('/admin/dashboard', [AdminDashboardController::class, 'index'])->name('admin.dashboard');
    Route::get('/admin/vehicles', [AdminVehiclesController::class, 'index'])->name('admin.vehicles');
    Route::get('/admin/vehicles/edit/{id?}', [AdminVehiclesController::class, 'edit'])->name('admin.vehicles.edit');
    Route::post('/admin/vehicles/edit/{id?}', [AdminVehiclesController::class, 'upsert']);
    Route::get('/admin/vehicles/delete/{id}', [AdminVehiclesController::class, 'delete']);
    Route::get('/admin/parts', [AdminPartsController::class, 'index'])->name('admin.parts');
    Route::get('/admin/parts/editParts/{id?}', [AdminPartsController::class, 'edit'])->name('admin.parts.editParts');
    Route::post('/admin/parts/editParts/{id?}', [AdminPartsController::class, 'upsert']);
    Route::get('/admin/parts/deleteParts/{id}', [AdminPartsController::class, 'delete']);
    Route::get('/admin/offers', [AdminOffersController::class, 'index'])->name('admin.offers');
    Route::post('/admin/offers/new', [AdminOffersController::class, 'new']);
    Route::get('/admin/offers/edit/{id?}', [AdminOffersController::class, 'edit'])->name('admin.offers.edit');
    Route::post('/admin/offers/edit/{id?}', [AdminOffersController::class, 'upsert']);
    Route::get('/admin/offers/delete/{id}', [AdminOffersController::class, 'delete']);
    Route::post('/admin/offers/to-worksheet/{id}', [AdminOffersController::class, 'toWorksheet']);
    Route::get('/admin/worksheets', [AdminWorksheetsController::class, 'index'])->name('admin.worksheets');
    Route::get('/admin/worksheets/view/{id}', [AdminWorksheetsController::class, 'view']);
    Route::post('/admin/worksheets/to-invoice/{id}', [AdminWorksheetsController::class, 'toInvoice']);
    Route::get('/admin/invoices', [AdminInvoicesController::class, 'index'])->name('admin.invoices');
    Route::get('/admin/invoices/view/{id}', [AdminInvoicesController::class, 'view']);
    Route::get('/admin/partners', [AdminPartnersController::class, 'index'])->name('admin.partners');
    Route::get('/admin/partners/edit/{id?}', [AdminPartnersController::class, 'edit'])->name('admin.partners.edit');
    Route::post('/admin/partners/edit/{id?}', [AdminPartnersController::class, 'upsert']);
    Route::get('/admin/partners/delete/{id}', [AdminPartnersController::class, 'delete']);
});

// user middleware
Route::middleware('auth','role:user')->group(function () {
    Route::get('/user', [UserController::class, 'UserIndex'])->name('user.index');
    Route::get('/vehicles', [UserVehiclesController::class, 'index'])->name('user.vehicles');
    Route::get('/vehicles/edit/{id?}', [UserVehiclesController::class, 'edit'])->name('user.vehicles.edit');
    Route::post('/vehicles/edit/{id?}', [UserVehiclesController::class, 'upsert']);
    Route::get('/vehicles/delete/{id}', [UserVehiclesController::class, 'delete']);
    Route::get('/offers', [UserOffersController::class, 'index'])->name('user.offers');
    Route::get('/offers/edit/{id?}', [UserOffersController::class, 'edit'])->name('user.offers.edit');
    Route::post('/offers/edit/{id?}', [UserOffersController::class, 'upsert']);
    Route::get('/offers/delete/{id}', [UserOffersController::class, 'delete']);
    Route::get('/invoices', [UserInvoicesController::class, 'index'])->name('user.invoices');
    Route::get('/invoices/view/{id}', [UserInvoicesController::class, 'view']);
});




require __DIR__.'/auth.php';
