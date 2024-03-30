<?php

use Ideasoft\Http\Controller\ActionController;
use Ideasoft\Http\Controller\TriggerController;
use Ideasoft\Http\Controller\WebhookController;
use Illuminate\Support\Facades\Route;

Route::prefix('ideasoft')->name('ideasoft.')->group(function () {
    Route::prefix('webhook')->name('webhook.')->group(function () {
        Route::post('/product-update', [WebhookController::class, 'productUpdateHook'])->name('product.update');

    });
    Route::middleware('internal')->group(function (){
        Route::apiResource('triggers', TriggerController::class);
        Route::apiResource('actions', ActionController::class);
    });
});
