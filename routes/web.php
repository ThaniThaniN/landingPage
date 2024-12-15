<?php

use App\Http\Controllers\LocaleController;
use App\Http\Controllers\ProductRequestController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\SuggestionRequestController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;

Route::get('/', [PageController::class, 'index']);
Route::get('locale/{lang}',[LocaleController::class,'setLocale']);
Route::get('/product-form', [PageController::class, 'productForm']);

Route::post('/product-request', [ProductRequestController::class, 'store']);
Route::post('/suggestion-request', [SuggestionRequestController::class, 'store']);

Route::put('/admin/pages/{id}/status', [PageController::class, 'updateStatus'])->name('page.updateStatus');


Route::prefix(env('ADMIN_URL_PREFIX', 'admin'))->group(function () {
    Route::get('login', [SessionController::class, 'create'])->name('login');
    Route::post('login', [SessionController::class, 'store']);
    Route::post('logout', [SessionController::class, 'destroy'])->name('logout');
});
