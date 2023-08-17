<?php

use App\Http\Controllers\AuthenticationController;
use App\Http\Controllers\ContractController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\InvoiceItemController;
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

// Route::get('/', [HomeController::class, 'index']);

Route::middleware(['guest'])->group(function () {
    Route::get('/', function () {
        return redirect('/login');
        // dd('here');s
    });
    Route::get('/login', [AuthenticationController::class, 'index'])->name('login');
    Route::post('/login', [AuthenticationController::class, 'login']);
});

Route::middleware(['auth'])->group(function () {
    Route::get('/', [HomeController::class, 'index']);
    Route::get('logout', [AuthenticationController::class, 'logout'])->name('logout');

    
    Route::resource('customers', CustomerController::class);
    Route::resource('contracts', ContractController::class);
    Route::resource('invoices', InvoiceController::class);
    Route::resource('invoiceitems', InvoiceItemController::class);

});



Route::fallback(function () {
    return response(view('404'), 404);
});