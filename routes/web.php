<?php

use App\Http\Controllers\Contracts;
use App\Http\Controllers\CostumerController;
use App\Http\Controllers\InvoiceController;
use Illuminate\Support\Facades\Route;

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

//Common Resource Routes:
// Index - show all listings
// show - show single list
// create - show form to create new listing
// store - store new listing
// edit - show form to edit list
// update - update list
// destroy - destroy list

//The Home Page
Route::get('/', [InvoiceController::class,'index'])->middleware('auth');

//Single Invoice
Route::get('/invoices/{invoice}', [InvoiceController::class,"show"])->middleware('auth');

//Show Register/Create Form
Route::get('/register',[CostumerController::class,'create'])->middleware('guest');

//Create New User
Route::post('/users',[CostumerController::class,'store']);

//Log User Out
Route::post('/logout',[CostumerController::class,'logout'])->middleware('auth');

//Show Login Form
Route::get('/login',[CostumerController::class,'login'])->name('login')->middleware('guest');

//Log User In
Route::post('/users/authenticate',[CostumerController::class,'authenticate']);

//Show Profile Form
Route::get('/users/{user}/edit',[CostumerController::class,'edit'])->middleware('auth');

//Delete Profile
Route::delete('/users/{user}/destroy',[CostumerController::class,'destroy'])->middleware('auth');

//Update Profile
Route::put('/users/{user}',[CostumerController::class,'update'])->middleware('auth');

//Show Contracts Page
Route::get('/contracts/create', [Contracts::class,'create'])->middleware('auth');

//Contracts Store
Route::post('/contracts', [Contracts::class,'store'])->middleware('auth');

//Manage Contracts Store
Route::get('/contracts/{costumer_contract}/manage', [Contracts::class,'manage'])->middleware('auth');

//Edit Contract
Route::get('/contracts/{costumer_contract}/edit', [Contracts::class,'edit'])->middleware('auth');

//Delete Contract
Route::delete('/contracts/{costumer_contract}', [Contracts::class,'destroy'])->middleware('auth');

//Update Contract
Route::put('/contracts/{costumer_contract}', [Contracts::class,'update'])->middleware('auth');

//Invoice Page
Route::get('/invoices', [Contracts::class,'show'])->middleware('auth');