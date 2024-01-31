<?php


use App\Http\Controllers\Internal\ConditionController;
use App\Http\Controllers\Internal\FlowController;
use App\Http\Controllers\Internal\UserController;
use Illuminate\Support\Facades\Route;

Route::middleware('internal')->prefix('internal')->name('prefix.')->group(function () {
    Route::get('/flow/find', [FlowController::class,'flowFind'])->name('flow.find');
    Route::get('/user/check-credit', [UserController::class,'checkCredit'])->name('user.check-credit');
    Route::get('/condition/find', [ConditionController::class,'findCondition'])->name('condition.find');
});
