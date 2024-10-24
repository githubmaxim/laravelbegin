<?php
declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\ForRedis;
use Illuminate\Support\Facades\Cache;

class ForRedisController extends Controller
{
    public function index()
    {

//        $posts = Cache::remember('for_redis:all', 60*60, function () {   //!!!!! создаст в кэш-таблице папку "laravelbegin" (так написано
// // в "config/database.php" в параметре "'prefix' => env('REDIS_PREFIX').':',"  где 'REDIS_PREFIX' берется из файла ".env"), в ней подпапку
// // с именем идущим до ":" - "for_redis" и потом запись в кэш-таблице с ключем со всеми словами и двоеточиями сразу "laravelbegin:for_redis:all"
// // и значением которое выведет вложенная функция !!!!!  60*60 это время в секундах (1 час) сколько эти данные будут храниться на сервере Redis
        $posts = Cache::rememberForever('for_redis:all', function () {
            return ForRedis::all();
        });
//        dd($posts->select('title')); //вернет 100 массивов по 1 значению в каждом
        dd($posts->pluck('title')); //(извлекает все значения из таблицы по заданному ключу невзирая на выборку:) вернет 1 массив со 100 значениями
    }

    public function show($id){ //в методе "show" нужно использовать не метод "remember", а метод "get()"
        if (!Cache::has('for_redis:'.$id)) { // Проверяем наличие в такой подпапке такой записи в Redis в таблице DB1 (потому что использовали фасад "Cache". Если бы фасад "Redis", то искало бы в таблице DB0)
            return 'No id = '.$id;
//            return redirect();
        }
        $posts2 = Cache::get('for_redis:'.$id); //получаем из кєш-таблицы подпапку с таким названием и из нее запись с таким "id"
//        dd($posts2->pluck('title'));  //извлекает все значения из таблицы по заданному ключу невзирая на выборку
        dd($posts2->title);
    }
}
