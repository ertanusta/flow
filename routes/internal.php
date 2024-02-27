<?php


use App\Http\Controllers\Internal\ActionContextController;
use App\Http\Controllers\Internal\ConditionController;
use App\Http\Controllers\Internal\FlowController;
use App\Http\Controllers\Internal\UserController;
use Illuminate\Support\Facades\Route;

Route::middleware('internal')->prefix('internal')->name('prefix.')->group(function () {
    Route::get('/flow/find', [FlowController::class,'flowFind'])->name('flow.find');
    Route::get('/user/check-credit', [UserController::class,'checkCredit'])->name('user.check-credit');
    Route::get('/user/get-paid', [UserController::class,'getPaid'])->name('user.get-paid');
    Route::get('/condition/find', [ConditionController::class,'findCondition'])->name('condition.find');
    Route::get('/action-context/find', [ActionContextController::class,'findActionContext'])->name('action.context.find');

});
