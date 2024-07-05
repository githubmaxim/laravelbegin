<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\View\View;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Тут мы регистрируем любой наш собственный или какой-то сторонний сервис, чтобы его можно было вызывать в нашем проекте
     */
    public function register(): void
    {
        //
    }

    /**
     * Код написанный тут выполняется раньше всех классов и будет выполняться для всех страниц
     * сайта, тут также создаются часто используемые переменные со значениями для общего использования в классах.
     */
    public function boot(): void
    {
        \Illuminate\Support\Facades\View::share('myVariable', 'valueMyVariable');
    }
}
