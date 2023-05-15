<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\ComplainController;

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
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//Complain Routes

// Route::get('complain/view', [App\Http\Controllers\ComplainController::class, 'feedback_view'])->name('feedback');
// Route::resource('/complains',App\Http\Controllers\ComplainController::class);


Route::resource('/complain',App\Http\Controllers\ComplainController::class);

Route::get('/complain/none', [App\Http\Controllers\ComplainController::class, 'no_complain'])->name('noComplain');

Route::get('/compalin/edit',[App\Http\Controllers\ComplainController::class,'editIndex'])->name('compEditIndex');

Route::get('/compalin/view',[App\Http\Controllers\ComplainController::class,'viewIndex'])->name('compViewIndex');

// complain status routes
Route::get('/compalin/status',[App\Http\Controllers\ComplainController::class,'statusIndex'])->name('compStatusIndex');
Route::get('/compalin/status/{id}',[ComplainController::class,'filterIndex'])->name('compFilter');

