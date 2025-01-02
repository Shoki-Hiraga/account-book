<?php

use App\Http\Controllers\HomebudgetController;
use App\Http\Controllers\InComeController;
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
    return view('main.index');
});


Route::get('/', [HomebudgetController::class, 'index'])->name('index');
Route::post('/post', [HomebudgetController::class, 'store'])->name('homebudget.store');
Route::get('/edit/{id}', [HomebudgetController::class, 'edit'])->name('homebudget.edit');
Route::put('/update', [HomebudgetController::class, 'update'])->name('homebudget.update');
Route::post('/destroy/{id}', [HomebudgetController::class, 'destroy'])->name('homebudget.destroy');

Route::get('/income', [IncomeController::class, 'index'])->name('index');
Route::post('/income-post', [IncomeController::class, 'store'])->name('income.store');
Route::get('/income/income_edit/{id}', [IncomeController::class, 'edit'])->name('income.income_edit');
Route::put('/income/update', [IncomeController::class, 'update'])->name('income.update');
Route::post('/income/destroy/{id}', [IncomeController::class, 'destroy'])->name('income.destroy');
