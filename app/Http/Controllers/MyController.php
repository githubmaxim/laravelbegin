<?php
declare(strict_types=1);

namespace App\Http\Controllers;

use Illuminate\Cache\CacheManager;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;

class MyController extends Controller
{

    public function index()
    {
        return "My Controller";
    }

    public function views1()
    {
        return view('My.view1', [
            'name' => 'John Doe',
            'age' => 32,
            'title' => 'My title'
        ]);
    }

    public function views2()
    {
        $name2 = 'Katy';
        $age2 = 27;
        $title2 = 'Katy title';
        return view('My.view2', compact('name2', 'age2', 'title2'));
    }

    public function views3()
    {
        $name3 = 'Max';
        $age3 = 27;
        $title3 = 'M title';
        return view('My.view3')->with('title3', $title3)->with('name3', $name3);
    }

    public function views4()
    {
        $data = [
            'name4' => 'Ted',
            'age4' => 20,
        ];
//        return view('My.view4', ['data' => $data]);
        return view('My.view4', compact('data'));
    }

    public function mainView()
    {
        return view('My.mainView', ['title' => 'Title for MainView']);
    }

    public function bladeDirectives()
    {
        //По адресу "https://jsonplaceholder.typicode.com" находится сайт с разного типа сформированными данными для проверок
        // работы своего кода или тестов

        //Используем чистый PHP код!
//        $users = json_decode(file_get_contents('https://jsonplaceholder.typicode.com/users')); //получаем массив объектов
//        $userVar = $users[0]->name;
//        print_r($userVar);

//        $users = json_decode(file_get_contents('https://jsonplaceholder.typicode.com/users'), true); //получаем массив массивов
//        $userVar = $users[0]['name'];
//        print_r($userVar);


        //Используем Laravel код!
        $users = Http::get('https://jsonplaceholder.typicode.com/users')->json(); //получаем массив массивов
//        $userVar = $users[0]['name'];
//        print_r($userVar);

//        var_dump($users);
//        dump($users);
        $title = 'Title for Blade';
        return view('My.bladeDirectives', ['users' => $users, 'title' => $title]);
    }

    public function getApp()
    {
        //!!!!Для того чтобы в функции создать переменную какого-то типа и использовать
        // готовые методы этого класса нужно перед ней написать строку с комментариями и аннотацией "@var"!!!!!

        /** @var \Illuminate\Cache\CacheManager $mycache */

        //Получение сервисов из Service Container:
        //вариант 1 через функции Helper-а
//        $mycache = cache(); //самый быстрый вызов какого-то сервиса (тут "cache()"), используя функцию Helper-а "cache()"
//        $mycache = app('cache'); // -//- используя фунцию Helper-а "app()" содержащую все сервисы
//        $mycache = app()->make('cache'); //2-й способ написания

//        $mycache->put('test', 12);
//        dd($mycache->get('test'));


         // вариант 2 через Facades
//        $mycache = App::make('cache')->put(test', 12); //получение сервиса через Facade "App", также содержащий все контейнеры, используя сразу метод "put()"
        Cache::put('test', 1237); //получение сервиса сразу через Facade "Cache", используя сразу метод "put()"
        $mycache=Cache::get('test');
        dd($mycache);


//        dd(app()); //выведет все данные из Service Container
    }

    public function store()
    {
        return "MYStore";
    }
}
