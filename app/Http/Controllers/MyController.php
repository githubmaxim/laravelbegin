<?php
declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\Country;
use Illuminate\Cache\CacheManager;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use Illuminate\Database\Eloquent\Factories\Factory;

class MyController extends Controller
{

    public function index()
    {
        //Позиционные плейсхолдеры
//        $users2 = DB::select('select id, name, email from users2 where id > ? and name != ?', [1, 'Kleo']);

        //Именованные плейсхолдеры используются если:
        //1. у нас много данных
//        $users2 = DB::select('select id, name, email from users2 where id > :id and name != :name', ['id'=>1, 'name'=>'Kleo']);
        // 2. у нас уже есть массив готовых данных, которые нужно просто подставить
        $data = [
            'id' => 1,
            'name' => 'Kleo',
        ];
        $users2 = DB::select('select id, name, email from users2 where id > :id and name != :name', $data);

        //        $dd = $users2[3]->name;

        //Для получения одного значения чего-то из БД используют метод "scalar":
        $cnt = DB::scalar('select count(*) from users2'); //получаем количество строк
        dump($cnt);

//        dump(DB::insert('insert into users2 (name, email, password) values (?, ?, ?)', ['d\'Arc2', 'darc3@mail.com', 555]));

//        dump(DB::update('update users2 set avatar = :avatar where id = :id', ['avatar' => 'jio', 'id' => '6']));

        //Тут обновляем все строки этих столбцов
//        dump(DB::update('update users2 set created_at = now(), updated_at = ?', [date('Y-m-d H:i:s')]));

//        dump(DB::delete('delete from users2 where id = :id', [':id' => 6]));

        //ТРАНЗАКЦИЯ
//        try {
//            DB::transaction(function () {
//                DB::insert('insert into users2 (name, email, password) values (?, ?, ?)', ['d\'Arc2', 'darc4@mail.com', 555]);
//                DB::insert('insert into users2 (name, email, password) values (?, ?, ?)', ['d\'Arc2', 'darc4@mail.com', 555]);
//            });
//        } catch (\Exception $e) {
//            dump($e->getMessage());
//        }


        //    Блок ELOQUENT !!!!

        //1. Выборки!!
//        $countries = DB::select('select id, "Name" from country');
//        dump($countries);

//        $countries = Country::all(['Name', 'SurfaceArea'])->toArray();
//        dump($countries);

        //тут прослоечный-метод "query()" даст возможность Laravel-ю в методе "find()" подсказывать нам имена переменных
//        $countries = Country::query()->find(2, ['id', 'SurfaceArea']);
//        dump($countries);

        //тут делается тоже, что и в "find()"  но в случае если такой записи нет, то выведет не "null",
        // а страницу с кодом "NOT FOUND, 404"
//        $countries = Country::findOrFail(50, ['id', 'SurfaceArea']);
//        dump($countries);

//        $country = Country::query()->first();
//        dump($country->toArray());
//        dump($country->Name);

//        $countries = Country::query()
//            ->where('SurfaceArea','>', 1000_000)
//            ->orderBy('SurfaceArea', 'desc')
//            ->limit(5)
//            ->get(['SurfaceArea', 'Code'])
//            ->toArray();
//        dump($countries);
//        return response()->json($countries);

//        dump('Count: ', Country::query()->get()->count());
//        dump('Max', Country::query()->get()->max('SurfaceArea'));
//        dump('Min', Country::query()->get()->where('SurfaceArea','>', 1_000_000)->min('SurfaceArea'));
//        dump('Avg', Country::query()->get()->avg('SurfaceArea'));


        //2. Создание новой записи!!
        //1-й способ
//        $country = new Country();
//        $country->Code = 'DGS';
//        $country->Name = 'USA';
//        $country->SurfaceArea = '5534532';
//        dump($country->save()); //dump тут используем для запуска команды save() при открытии базовой страницы
        //2-й способ
//        dump(Country::query()->create([
//            'Code' => 'RRW',
//            'Name' => 'Canada',
//            'SurfaceArea' => '9384'
//        ]));


        return view('My.index', compact('users2'));
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
        $mycache = Cache::get('test');
        dd($mycache);


//        dd(app()); //выведет все данные из Service Container
    }


    //Работаем с запросами POST
    public function store(Request $request)
    {
//        var_dump($request->SurfaceArea);
//        var_dump($request->all(['Code', 'Name'])); //так можем отобрать только те поля, которые нам нужны

        //сохраняем в БД данные пришедшие с Post-запросом
//        Country::query()->create($request->all());

        return $request;
    }

    public function update(Request $request){
// Метод 1
//        $country = Country::query()->find($request->id);
//        $country->Code = $request->Code;
//        $country->Name = $request->Name;
//        $country->SurfaceArea = $request->SurfaceArea;
//        $country->save();
//Метод 2
        $country = Country::query()->findOrFail($request->id);
        $country->update($request->all());

        return 'OK';
    }

    public function destroy(Request $request) //!!!Получается отправить "id" только методом POST, но не DELETE
    {
        //Метод 1
//        $country = Country::query()->find(61);
//        $country = Country::query()->find($request->id);
//        $country->delete();
        //Метод 2
        Country::destroy($request->id);

        return 'OK';
    }
}
