<?php

use App\Http\Controllers\App\ActionController;
use App\Http\Controllers\App\BillingController;
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

Route::get('/test', function () {
    $routeCollection = Route::getRoutes();

    echo "<table style='width:100%'>";
    echo "<tr>";
    echo "<td width='10%'><h4>HTTP Method</h4></td>";
    echo "<td width='10%'><h4>Route</h4></td>";
    echo "<td width='10%'><h4>Name</h4></td>";
    echo "<td width='70%'><h4>Corresponding Action</h4></td>";
    echo "</tr>";
    foreach ($routeCollection as $value) {
        echo "<tr>";
        echo "<td>" . $value->methods()[0] . "</td>";
        echo "<td>" . $value->uri() . "</td>";
        echo "<td>" . $value->getName() . "</td>";
        echo "<td>" . $value->getActionName() . "</td>";
        echo "</tr>";
    }
    echo "</table>";
});
Route::get('/', function () {
    return view('welcome');
});

Route::get('/app', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware(['auth', 'verified'])->prefix('app')->name('app.')->group(function () {
    Route::get('/',[HomeController::class,'index'])->name('dashboard');
    Route::resource('/flows',FlowController::class);
    Route::resource('/billings', BillingController::class);
    Route::get('/flows-all',[FlowController::class,'all'])->name('flows.all');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/triggers', [TriggerController::class, 'all'])->name('trigger.all');
    Route::get('/actions', [ActionController::class, 'all'])->name('action.all');
});

require __DIR__.'/auth.php';
require __DIR__.'/internal.php';
