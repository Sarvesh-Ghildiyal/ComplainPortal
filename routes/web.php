<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\ComplainController;
use App\Http\Controllers\Admin\AdminHomeController;
use App\Http\Controllers\Admin\Auth\AdminLoginController;

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

//For deleting operation of complain
Route::get('/complian/delete',[PageController::class,'deleteIndex'])->name('compDeleteIndex');
Route::get('/complian/{complain}/delete',[PageController::class,'delete'])->name('complain.delete');


//FOR ADMIN
Route::namespace('Admin')->prefix('admin')->name('admin')->group(function(){
    Route::namespace('Auth')->group(function(){

        //to show login page
        Route::get('login',[AdminLoginController::class,'show'])->name('Login');
        Route::post('login',[AdminLoginController::class,'store'])->name('LoginSubmit');
    });

    Route::middleware('admin')->group(function(){
         Route::get('dashboard',[AdminHomeController::class,'index'])->name('Dashboard');

    });
   Route::post('logout',[AdminLoginController::class,'destroy'])->name('Logout');
});