<?php

use sajjadgozal\SimpleCrud\Http\Controllers\ItemController;
use sajjadgozal\SimpleCrud\Http\Middleware\ExtractItem;

Route::group(['middleware' => ExtractItem::class ],function () {

    Route::get('/crud/{item_name}',[ItemController::class,'index'])->name('crudIndex');
    Route::get('/crud/{item_name}/create',[ItemController::class,'create'])->name('crudCreate');
    Route::post('/crud/{item_name}',[ItemController::class,'store'])->name('crudStore');
    Route::get('/crud/{item_name}/{id}',[ItemController::class,'show'])->name('crudShow');
    Route::get('/crud/{item_name}/{id}/edit',[ItemController::class,'edit'])->name('crudEdit');
    Route::patch('/crud/{item_name}/{id}',[ItemController::class,'update'])->name('crudUpdate');

});

