<?php

use App\Http\Controllers\App\ActionController;
use App\Http\Controllers\App\FlowController;
use App\Http\Controllers\App\HomeController;
use App\Http\Controllers\App\ProfileController;
use App\Http\Controllers\App\TriggerController;
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
    return view('welcome');
});

Route::get('/app', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware(['auth', 'verified'])->prefix('app')->name('app.')->group(function () {
    Route::get('/',[HomeController::class,'index'])->name('dashboard');
    Route::resource('/flows',FlowController::class);
    Route::get('/flows-all',[FlowController::class,'all'])->name('flows.all');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/triggers', [TriggerController::class, 'all'])->name('trigger.all');
    Route::get('/actions', [ActionController::class, 'all'])->name('action.all');
});

require __DIR__.'/auth.php';
require __DIR__.'/internal.php';
