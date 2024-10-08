<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\ForAutentController;
use App\Http\Controllers\ForCacheController;
use App\Http\Controllers\ForMailController;
use App\Http\Controllers\ForRedisController;
use App\Http\Controllers\ForValidController;
use App\Http\Controllers\MyController;
use App\Http\Controllers\MyPolymorphController;
use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken;
use Illuminate\Support\Facades\Auth;
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



Route::prefix('admin')->name('admin.')->group(function () { //в "prefix" начальные буквы для "uri", в "name" начальные буквы для "name"
    Route::get('/products', [AdminController::class, 'index'])->name('products.index'); //мы через метод "route()"
    // и это имя в контроллере можем получить полный адрес страницы. Т.е. даже если измениться название контроллера или URI
    // мы все равно правильно обратимся к нужному нам методу контроллера
    Route::get('/products/create', [AdminController::class, 'create'])->name('products.create');
    Route::post('/products', [AdminController::class, 'store'])->name('products.store')->withoutMiddleware(VerifyCsrfToken::class);
    Route::get('/products/{id}', [AdminController::class, 'show'])->name('products.show');
    Route::get('/products/{id}/edit', [AdminController::class, 'edit'])->name('products.edit');
    Route::put('/products/{id}', [AdminController::class, 'update'])->name('products.update')->withoutMiddleware(VerifyCsrfToken::class);
    Route::delete('/products/{id}', [AdminController::class, 'destroy'])->name('products.destroy')->withoutMiddleware(VerifyCsrfToken::class);
//или Создание всех маршрутов одной строкой (или как в нашем случае выбираем только создание методов 'index', 'show')
//Route::resource('products', 'App\Http\Controllers\Admin\AdminController')->only('index', 'show');
});



Route::prefix('forValid')->name('forValid.')->group(function () {
    Route::get('/create', [ForValidController::class, 'create'])->name('create');
    Route::post('/store', [ForValidController::class, 'store'])->name('sttore');
});



Route::prefix('forAutent')->name('forAutent.')->group(function () {
    Route::get('/login', [ForAutentController::class, 'getLogin'])->name('login');
    Route::post('/login', [ForAutentController::class, 'postLogin'])->name('login.post');

    Route::get('/registrat', [ForAutentController::class, 'getRegistrat'])->name('registrat');
    Route::post('/registrat', [ForAutentController::class, 'postRegistrat'])->name('registrat.post');

    Route::get('/private', [ForAutentController::class, 'private'])->middleware('auth:web')->name('private');
//    Route::get('/private', [ForAutentController::class, 'private'])->middleware('auth.basic')->name('private');
//    Route::get('/private', [ForAutentController::class, 'private'])->name('private');

    Route::get('/logout', [ForAutentController::class, 'getLogout'])->name('logout');
});



Route::prefix('forRedis')->name('forRedis.')->group(function () {
    Route::get('/getRedis', [ForRedisController::class, 'index'])->name('index');
    Route::get('/getRedis/{id}', [ForRedisController::class, 'show'])->name('show');
});



//!!!!!!   Route::withoutMiddleware('auth:web')->group(function () {})  //так мы для всех адресов сразу требуем аутентификацию !!!!!!



  Route::prefix('forCache')->name('forCache.')->group(function () {
      Route::get('/create', [ForCacheController::class, 'store'])->name('create');

      Route::get('/login', [ForCacheController::class, 'getLogin'])->name('login');
      Route::post('/login', [ForCacheController::class, 'postLogin'])->name('login.post');

      Route::get('/registrat', [ForCacheController::class, 'getRegistrat'])->name('registrat');
      Route::post('/registrat', [ForCacheController::class, 'postRegistrat'])->name('registrat.post');

      Route::get('/private', [ForCacheController::class, 'private'])->middleware('auth:web')->name('private');

      Route::get('/logout', [ForCacheController::class, 'getLogout'])->name('logout');

      Route::post('/create', [ForCacheController::class, 'store'])->name('store');

  });



  Route::prefix('forMail')->name('forMail.')->group(function () {
      Route::get('/show', [ForMailController::class, 'show'])->name('show');
  });



  Route::prefix('forPolymorph')->name('forPolymorph.')->group(function () {
     Route::get('/show', [MyPolymorphController::class, 'show'])->name('show');
  });



