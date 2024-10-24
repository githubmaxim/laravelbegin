<?php

namespace App\Console\Commands;

use App\Models\ForRedis;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Redis;

class RedisTestCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'redis:go';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
//  Тренируемся заполнять данные в Redis-таблицу
//        Cache::put('example', 'Hello World'); //сохраняем в Redis в таблицу DB1 ключ/значение
//        Cache::put('example', 'no Hello World'); //перезаписываем значение для ключа "example"
//        Cache::forget('example'); //удаляем запись с ключом "example" и его значением



//  Тренируемся правильно получать данные из Redis-таблицы
//        $str = 'some thing2';
//        $result = Cache::remember('example',60*60, function () use ($str) {     //"use()" используется для получения доступа к переменной "$str" внутри функции
                                                                                  //  60*60 это время в секундах (1 час) сколько эти данные будут храниться на сервере Redis
//            return $str;
//        });
//        $result = Cache::rememberForever('example', function () use ($str) {
//            return $str;
//        });



// Заполняем таблицу тестовыми данными
//        ForRedis::factory(100)->create(); //создаем 100 записей в таблице используя factory



// Разбиваем данные в Redis-таблице так, чтобы в ней лежала не одна запись со всеми 100 строками из
// таблицы 'for_redis', а 100 записей в каждой из которых лежит одна строка
//        ForRedis::all()->each(function ($item) {
//            Cache::put('for_redis:' . $item->id, $item); //в таблицу DB1
//        });
    //или
//        ForRedis::all()->each(function ($item) {
//            Redis::set('for_redis:' . $item->id, json_encode($item)); //в таблицу DB0
//        });



// Один из вариантов, как сохранять пришедшие данные в БД + Кэш
        //имитируем пришедшие данные
//        $data = [
//            'title'=>'some title',
//            'content'=>'some content',
//            'likes'=>20,
//        ];

//        $post = ForRedis::create($data); //сохраняем данные в БД и в переменную
//        Cache::put('for_redis:' . $post->id, $post); //сохраняем данные в Кэш в таб. "DB1" !
        //или так
//        Redis::set('for_redis:' . $post->id, json_encode($post)); //сохраняем данные в Кэш в таб. "DB0" !



//  Разница между фасадам Cache u Redis (почему в основном используют фасад Cache):
//        dump(Cache::get('for_redis:' . $post->id)); //вернет массив
//
//        dump(Redis::get('for_redis:101')); //вернет не массив объектов, а одну большую строку!!!

        //!!!  И только такое написание сравняется с маленькой строчкой с Cache выше !!!
//        dump(ForRedis::make((array)json_decode(Redis::get('for_redis:' . $post->id))));



// Остальные (не get/set) методы по работе с бд-Redis применимые только для фасада "Redis" не для "Cache"
//        Redis::lpush('key:k1',json_encode($data));
//        Redis::lpush('key:k2',json_encode('Kate'));
//        Redis::lpush('key:k3',json_encode("Pol"));
//        Cache::lpush('key',json_encode($data)); //так не работает
//        Redis::sAdd('tey:t1',json_encode($data));
//        Redis::sAdd('tey:t2',json_encode('Kate'));
//        Redis::sAdd('tey:t3',json_encode("Pol"));
//        Redis::hSet('hey:h1',json_encode($data), '1');
//        Redis::hSet('hey:h2',json_encode('Kate'),'2');
//        Redis::hSet('hey:h3',json_encode("Pol"),'er');



        //Тестирование
        //тестирование обращения в БД и в Redis
//        $before = microtime(true);
//        $posts = Redis::lrange("for_redis",0,-1);
//        $after = microtime(true);
//        dump('Redis: '.$after - $before);

//        $before = microtime(true);
//        $posts = ForRedis::all();
//        $after = microtime(true);
//        dump('BD: '.$after - $before);




    }
}
