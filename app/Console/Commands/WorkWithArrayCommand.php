<?php
declare(strict_types=1);

namespace App\Console\Commands;

use App\Models\Country;
use Faker\Guesser\Name;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class WorkWithArrayCommand extends Command
{
    protected $signature = 'array:work';

    protected $description = 'Command description';

    public function handle(): void
    {
        $z = [];
        if ($z){echo'OK';} else{echo'ERROR';};
        dd();

//        $a=date('Y-m-d',strtotime('-30 days')).' - '.date('Y-m-d');
//dd($rangeselect_arr = $a ? explode(' - ', $a) : array());

//        $where_case=[];
//        $where_case[] = ['campaign_id', '=', 0];
//        dump('where_case = ', $where_case);
//        $where_case[] = ['created_at', '>=', 2];
//        dump('where_case = ', $where_case);
//        $where_case[] = ['qqqted_at', '>=', 3];
//        dump('where_case = ', $where_case);
//        $where_case[] = ['created_at', '<=', 1];
//       dd('where_case = ', $where_case);

//        $a = [];
//        $a = [
//            'success' => 'finish',
//            'callback_s' => 'finish',
//            'callback' => 'abort',
//            'wait' => 'abort',
//            'abndnd' => 'abort',
//            'not_reachable' => 'abort',
//            'not_exist' => 'abort',
//            'bad_connection' => 'abort'
//        ];
//        $s = $a['callback_s'];
//        $day = date("Y-m-d");
//        $total[$s][$day] = 0;
//        $total[$s][$day] = (int)$total[$s][$day] + 1;
//        if (!isset($total['abort'][$day])) $total['abort'][$day] = 0;
//        dd($total);



        $query_items = DB::table('country')
            ->select("country.id",
                "country.Name",
                "country.Code",
                "country.SurfaceArea",
                "country.created_at")
            ->limit(3)
//            ->take(2) //или так
            ->get();
//        dd("query_items = ", $query_items);

//        $twoitems = [];
//        foreach ($query_items as $item) {
//            $twoitems[$item->id] = [ //вставляем сюда ключ с номером "id", чтобы потом, при формировании нового массива, можно было вставлять эти значения без лишнего перебора внутри перебора
//                $item->SurfaceArea,
//                $item->created_at,
//            ];
//        }
//        dd("twoitems = ", $twoitems);  // 7 => array:2 [ 0 => 5555, 1 => "2024-07-07 12:21:25"] - сформирован массив массивов

        $twoitems = [];
        foreach ($query_items as $item) {
            $twoitems[$item->id] = (object)[ //вставляем сюда ключ с номером "id", чтобы потом, при формировании нового массива, можно было вставлять эти значения без лишнего перебора внутри перебора
                $item->SurfaceArea,
                $item->created_at,
            ];
        }
//        dd("twoitems2 = ", $twoitems);  // 7 => {#599   +"0": 5555, +"1": "2024-07-07 12:21:25"} - сформирован массив объектов


//        $group_data2 = ['id', 'Name', 'Code', 'SurfaceArea', 'created_at']; //так я просто заполняю массив ключами со значениями
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
                $twoitems[$item->id], //просто вставляем значение из переменной $twoitems ( 3 => {#599  +"0": 5555, +"1": "2024-07-07 12:21:25"} )
//                json_encode($twoitems[$item->id]), //значение из переменной $twoitems переводится в Json строку ( 3 => "{"0":5555,"1":"2024-07-07 12:21:25"}" )
            ];
        }
//        dd("group_data = ", $group_data);

        $data = [
            'camp_id' => 92, //один раз, сверху, в массив добавляем данные этой и следующей строчки
            'brand_id' => 1,
            'csv_data' => array_values($group_data), //меняет мои ключи на ключи по порядку
//            'csv_data' => $group_data,
        ];
//        dd("data = ", $data);
/////////////////////////////////////////////////////////////////////////////////////////////////


        $column = $data['csv_data'][0]; //берем такой элемент из массива
        unset($data['csv_data'][0]); //удаляем в массиве "data" из подмассива "csv_data" запись с ключом "0"
//        dump("column = ", $column);
//        dump("data['csv_data'] = ", $data['csv_data']);
        $camp_id = $data['camp_id'];
//        dd("camp_id = ", $camp_id);

        $brand_id = $data['brand_id'];
//        dd("brand_id = ", $brand_id);

        $main_columns = ['id', 'name', 'delete'];
        $custom_column = [];
        $a = 19;
//        foreach ($column as $name) {
        foreach ($column as $key => $name) {
            $code = strtolower(str_replace(' ', '_', trim($name)));
//            echo "code = ";
//            dump($code);
//            if (1>1) {
            if (!in_array($code, $main_columns)) {
                //если такое значение не найдено, то мы, методом "get_customfield" (реальная строчка кода ниже закомментирована) запишем его в таблицу и полученный id-номер записи занесем (как значение) в массив "$custom_column"
                $colar = array(
                    'code' => $code,
                    'title' => $name,
                );
//                $custom_column[$code] = $this->get_customfield($colar);
                $custom_column[$code] = $a++;
//                dump("custom_column = ", $custom_column);
            }
            //и в любом случае мы перезаписываем значение с внесенным форматированием(или без, если и так было так же) в массив $column
//            $column = $code; //если писать так, то будет просто менять одно значение на другое
            $column[$key] = $code;
//            dump("column = ", $column);
        }

//        $id_col = 1;
//        $name_col = 3;
        $id_col = array_search('id', $column);
//        dump("id_col = ", $id_col);

        $name_col = array_search('name', $column);
//        dump("name_col = ", $name_col);

        $code_col = array_search('code', $column);

//        Поля 'email' у меня нет, но так задумано, чтобы если нет - то проверка дальше не пустит работать с этим отсутствующим полем
        $email_col = array_search('email', $column);
//        dump("email_col = ", $email_col);


//        $for_delete = [[1=>'a', 2=>'b'], [1=>'aa', 2=>'bb']];
//        dump("for_delete = ", $for_delete);
//        foreach ($for_delete as $row) {
//            dump("row = ", $row);

//        foreach ($data as $row) {
        foreach ($data['csv_data'] as $row) {
            $new_player_info = [];
            if (is_numeric($id_col)) {
//                $new_player_info['id'] = $row[$id_col]; //если $id_col будет цифрой(т.е. мы пройдем проверку в предыдущей строке), но элемента массива на таком месте не будет, то выпадет ошибка
                $new_player_info['id'] = 6; //если $id_col будет цифрой(т.е. мы пройдем проверку в предыдущей строке), но элемента массива на таком месте не будет, то выпадет ошибка
            }
            if (is_numeric($name_col)) {
                $new_player_info['Name'] = "Peru";
//                $new_player_info['Name'] = "Korea";
//                $new_player_info['Name'] = $row[$name_col];
            }
            if (is_numeric($code_col)) {
//                $new_player_info['Code'] = "C";
                $new_player_info['Code'] = "GR";
//                $new_player_info['Code'] = $row[$code_col];
            }
            if (is_numeric($email_col)) { //т.к. такого элемента в массиве нет, то "$email_col=false" и эта проверка на следующую строку не пустит и ошибка там не вылетит
                $new_player_info['email'] = $row[$email_col];
            }
            if (!count($new_player_info)) { //если на этом шаге массив "$new_player_info" не заполнился ни какими данными, то мы пропускаем код ниже для этого шага цикла и сразу переходим на следующий шаг
                continue;
            }
//            dump("new_player_info = ", $new_player_info);

            $countries = Country::first()->get();
            $const = $countries[0]->created_at;
//            $const = $countries[0]->created_at->toDateTimeString();

            //Ищет совпадение значений по полю в первом 'where' + хотя бы по одному из полей, находящихся в массиве "$new_player_info" и тогда выводит всю строку(помещенную "->toArray()" в массив) из коллекции
            $country = Country::where('created_at', $const)
                ->where(function ($query) use ($new_player_info) {
                    foreach ($new_player_info as $name => $value) {
                        $query->orWhere($name, $value);
                    }
                });  //если нет в конце "->get();", томы получаем объект "Illuminate\Database\Eloquent\Builder" и тогда к полям можно обратиться только написав вначале какой-то доп.метод (типа first()) и только потом можно вызвать поле
//                ->get();
//                ->toArray();
//            dd("country = ", $country);
//            dd($country->first()->id);


//            dd(Country::where('Name', 'like','%o%')
//                ->where('SurfaceArea', '>',1000)
//                ->orderBy('id')
//                ->pluck('id')
//                ->toArray()
//            );

//            dd(Country::query()->orderBy('updated_at', 'desc')->pluck('updated_at')->toArray());
//            dd(Country::query()->orderBy('updated_at', 'desc')->pluck('updated_at')->first());

        }
    }


}
