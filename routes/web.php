<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\MyController;
use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken;
use Illuminate\Support\Facades\Route;

//Route::get('/', function () {
//    return view('welcome');
//});
Route::get('/test', function () {
    return 'welcome';
});
Route::get('/', [MyController::class, 'index']);
Route::get('/views1', [MyController::class, 'views1']);
Route::get('/views2', [MyController::class, 'views2']);
Route::get('/views3', [MyController::class, 'views3']);
Route::get('/views4', [MyController::class, 'views4']);
Route::get('/mainView', [MyController::class, 'mainView']);
Route::get('/bladeDirectives', [MyController::class, 'bladeDirectives']);
Route::get('/getApp', [MyController::class, 'getApp']);
Route::post('/posts', [MyController::class, 'store'])->withoutMiddleware([VerifyCsrfToken::class]);
Route::post('/update', [MyController::class, 'update'])->withoutMiddleware([VerifyCsrfToken::class]);
Route::post('/delete', [MyController::class, 'destroy'])->withoutMiddleware([VerifyCsrfToken::class]); //!!!получается только методом POST(но не DELETE)

Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/products', [AdminController::class, 'index'])->name('products.index');
    Route::get('/products/create', [AdminController::class, 'create'])->name('products.create');
    Route::post('/products', [AdminController::class, 'store'])->name('products.store')->withoutMiddleware(VerifyCsrfToken::class);
    Route::get('/products/{id}', [AdminController::class, 'show'])->name('products.show');
    Route::get('/products/{id}/edit', [AdminController::class, 'edit'])->name('products.edit');
    Route::put('/products/{id}', [AdminController::class, 'update'])->name('products.update')->withoutMiddleware(VerifyCsrfToken::class);
    Route::delete('/products/{id}', [AdminController::class, 'destroy'])->name('products.destroy')->withoutMiddleware(VerifyCsrfToken::class);
//Route::resource('products', 'App\Http\Controllers\Admin\AdminController')->only('index', 'show');
});


