<?php
declare(strict_types=1);

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class WorkWithArrayCommand extends Command
{
    protected $signature = 'array:work';

    protected $description = 'Command description';

    public function handle(): void
    {
        $query_items = DB::table('country')
            ->select("country.id",
                "country.Name",
                "country.Code",
                "country.SurfaceArea",
                "country.created_at")
            ->limit(2)
//            ->take(2) //или так
            ->get();
//        echo "query_items = ";
//        dump($query_items);

        $twoitems = [];
        foreach ($query_items as $item) {
            $twoitems[$item->id] = [ //вставляем сюда ключ с номером "id", чтобы потом, при формировании нового массива, можно было вставлять эти значения без лишнего перебора внутри перебора
                $item->SurfaceArea,
                $item->created_at,
            ];
        }
//        echo "twoitems = ";
//        dump($twoitems);

        $group_data2 = ['id', 'Name', 'Code', 'SurfaceArea', 'created_at']; //так я просто заполняю массив ключами со значениями
        $group_data = [ //так я создаю в массиве еще один массив(подмассив), и уже подмассив заполняю ключами со значениями. И этот подмассив будет с ключем "0".
            ['id', 'Name', 'Code', 'json']
        ];
//        dump($group_data);
//        dd($group_data2);

        foreach ($query_items as $item) {
            $group_data [$item->id] = [ //нужно вставлять при формировании массива ключ, иначе просто будет заменяться одно значение на другое
                $item->id,
                $item->Name,
                $item->Code,
//                $twoitems[$item->id], //так формируем в массиве еще один массив(подмассив)
                json_encode($twoitems[$item->id]), //так в массиве формируем строку, которая содержит JSON-представление значения (в квадратных скобках, через запятую, выбираются значения текущей строки массива)
            ];
        }
//        echo "group_data = ";
//        dump( $group_data);

        $data = [
            'camp_id' => 92, //один раз, сверху, в массив добавляем данные этой и следующей строчки
            'brand_id' => 1,
            'csv_data' => array_values($group_data), //меняет мои ключи на ключи по порядку
//            'csv_data' => $group_data,
        ];
//        echo "data = ";
//        dump($data);
/////////////////////////////////////////////////////////////////////////////////////////////////


        $column = $data['csv_data'][0]; //берем такой элемент из массива
        unset($data['csv_data'][0]);
        echo "column = ";
        dump($column);
//        echo "data = ";
//        dd($data);
$camp_id = $data['camp_id'];
//        echo "camp_id = ";
//        dd($camp_id);

        $brand_id = $data['brand_id'];
//        echo "brand_id = ";
//        dd($brand_id);

        $main_columns = ['id', 'name', 'surfacearea'];
        $custom_column = [];
        $a = 19;
//        foreach ($column as $name) {
        foreach ($column as $key => $name) {
            $code = strtolower(str_replace(' ', '_', trim($name)));
            echo "code = ";
            dump($code);
//            if (1>1) {
            if (!in_array($code, $main_columns)) {
                //если такое значение не найдено, то мы, методом "get_customfield" (реальная строчка кода закомментирована) запишем его в таблицу и полученный id-номер записи занесем (как значение) в массив "$custom_column"
                $colar = array(
                    'code' => $code,
                    'title' => $name,
                );
//                $custom_column[$code] = $this->get_customfield($colar);
                $custom_column[$code] = $a++;
                echo "custom_column = ";
                dump($custom_column);
            }
            //а если такое значение найдено, то мы перезаписываем его с внесенными правками(или без, если и так было так же) в массиве $column
//            $column = $code; //если писать так, то будет просто менять одно значение на другое
            $column[$key] = $code;
            dump($column);
        }

    }


}
