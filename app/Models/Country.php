<?php
declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    use HasFactory;

//    protected $table = 'country'; //если наименование нашей таблицы отличается от ожидаемого Laravel "countries"
//    public $incrementing = false; //если у нас ключ автоинкрементирован
//    protected $keyType = 'string'; //если у нас ключ не числовой а текстовый
//    protected $primaryKey = 'aaa'; //если название поля первичного ключа отличается от "id"
    //!!! и еще 21 изменяемый тип из класса Model !!!

    protected $fillable = [
        'Code',
        'Name',
        'SurfaceArea',
    ];

    protected $hidden = [ //поля которые не будут видны при переводе в Json или при использовании метода "toArray()", а при остальной работе с выборками будут видны
        'created_at',
        'updated_at',
    ];
}
