<?php

use Illuminate\Support\Facades\Route;

Route::get('/', [\App\Interfaces\Http\Controllers\OneShotLinkController::class, 'index'])->name('link.index');

Route::group(['prefix'=>'link'],function (){
    Route::post('/', [\App\Interfaces\Http\Controllers\OneShotLinkController::class, 'create'])->name('link.create');
    Route::get('/{id}', [\App\Interfaces\Http\Controllers\OneShotLinkController::class, 'show'])->where('id', '[0-9a-fA-F\-]{36}')->name('link.show');
})->middleware('web');

