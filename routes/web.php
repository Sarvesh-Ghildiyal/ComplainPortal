<?php

use Illuminate\Support\Facades\Route;
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

Route::get('/home/complain', [App\Http\Controllers\ComplainController::class, 'complain_form'])->name('complain');
Route::post('/home/complain', [App\Http\Controllers\ComplainController::class, 'submit_complain'])->name('submit_complain');

Route::get('/home/complains/feedback', [App\Http\Controllers\ComplainController::class, 'feedback_view'])->name('feedback');
