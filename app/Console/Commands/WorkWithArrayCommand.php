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
        echo "query_items = ";
        dump($query_items);

        $twoitems = [];
        foreach ($query_items as $item) {
            $twoitems[$item->id] = [
                $item->SurfaceArea,
                $item->created_at,
            ];
        }
        echo "twoitems = ";
        dump($twoitems);

//        $data2 = ['id', 'Name', 'Code', 'SurfaceArea', 'created_at'];
        $group_data = [
            ['id', 'Name', 'Code', 'json']
        ];
//        dump($data);
//        dd($data2);

        foreach ($query_items as $item) {
            $group_data [$item->id] = [ //нужно вставлять при формировании массива ключ, иначе просто будет заменяться одно значение на другое
                $item->id,
                $item->Name,
                $item->Code,
//                $twoitems[$item->id], //так формируем в массиве еще один массив(подмассив)
                json_encode($twoitems[$item->id]), //так в массиве формируем строку, которая содержит JSON-представление значения (в квадратных скобках, через запятую, выбираются значения текущей строки массива)
            ];
        }
        echo "group_data = ";
        dump( $group_data);

        $data = [
            'camp_id' => 92,
            'brand_id' => 1,
            'csv_data' => array_values($group_data), //меняет мои ключи на ключи по порядку
//            'csv_data' => $group_data,
        ];

//        dd($data);
/////////////////////////////////////////////////////////////////////////////////////////////////


        $colum = $data['csv_data'][0]; //берем такой элемент из массива
        dd($colum);


    }


}
