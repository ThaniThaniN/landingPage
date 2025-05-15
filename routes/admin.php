<?php


use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductRequestController;
use App\Http\Controllers\SuggestionRequestController;
use App\Http\Controllers\TranslationController;
use App\Http\Controllers\UiController;
use Illuminate\Support\Facades\Route;
use App\Models\User;

// admin.php route

app()->setLocale('ar');

Route::view('/', 'admin.index')->name('dashboard');

Route::controller(UiController::class)->group(function () {
    Route::patch('/edit-ui/update-all-cards/{sectionId}', 'updateCards')->name('cards.updateMultiple');
    Route::PATCH('/edit-ui/updateInfo/{section}', 'updateInfo')->name('update-section');
    Route::get('/edit-ui/{sectionId}', 'index')->name('edit-section-index');
});




Route::controller(ProductRequestController::class)->group(function () {
    Route::get('/product-requests', 'index')->name('product-requests');
    Route::get('/product-requests/edit/{productRequest}', 'show')->name('product-requests.edit');
    Route::PATCH('/product-requests/edit/{productRequest}', 'update')->name('product-requests.update');
});


Route::controller(SuggestionRequestController::class)->group(function () {
    Route::get('/suggestion-requests', 'index')->name('suggestion-requests');
    Route::get('/suggestion-requests/edit/{suggestionRequest}', 'show')->name('suggestion-requests.edit');
    Route::PATCH('/suggestion-requests/edit/{suggestionRequest}', 'update')->name('suggestion-requests.update');
});


//Route::PATCH('/edit-ui/update-card/{card}', [CardController::class, 'updateMultiple'])->name('update-all-card');


Route::controller(UserController::class)->group(function(){
    Route::get('/moderators/create', 'create')->name('moderators.create');
    Route::get('/moderators/edit', 'index')->name('moderators.index');
    Route::get('/moderators/edit/{user}', 'show')->name('moderators.edit');
    Route::patch('/moderators/update/{user}', 'update')->name('moderators.update');
    Route::post('/moderators/create', 'store')->name('moderators.store');
    Route::delete('/moderators/delete/{user}', 'destroy')->name('moderators.destroy');
});

Route::get('/translations', [TranslationController::class, 'index'])->name('translations.index');
Route::patch('/translations', [TranslationController::class, 'update'])->name('translations.update');
Route::delete('/translations', [TranslationController::class, 'destroy'])->name('translations.destroy');
