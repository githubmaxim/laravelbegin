<?php
declare(strict_types=1);

namespace App\Console\Commands;

use App\Models\Polymorph\Imagemm;
use App\Models\Polymorph\Imagemo;
use App\Models\Polymorph\Imageoo;
use App\Models\Polymorph\Videomm;
use App\Models\Polymorph\Videomo;
use App\Models\Polymorph\Videooo;
use Illuminate\Console\Command;

class PolymorphCommand extends Command
{
    protected $signature = 'polymorph:go';

    protected $description = 'Command description';

    public function handle(): void
    {
 //Так загружаются(подвязываются) данные в общую таблицу при Полиморфной связи OneToOne
//        $image = Imageoo::findOrFail(1);
//        dump($image->commentoos()->create([
//            'body'=>'image1'
//        ]));

//        $video = Videooo::findOrFail(1);
//        dump($video->commentoos()->create([
//            'body'=>'video1'
//        ]));
//


 //Так загружаются(подвязываются) данные в общую таблицу при Полиморфной связи ManyToOne
//        $imagemo = Imagemo::findOrFail(1);
//        dump($imagemo->commentmos()->create([
//                'body'=>'imagemo1'
//        ]));

        //тут мы подвязываем еще одно значение поля 'body' в таблице 'commentmos' к первой записи в таблице 'imagemos'
//        $imagemo = Imagemo::findOrFail(1);
//        dump($imagemo->commentmos()->create([
//            'body'=>'imagemo1-2'
//        ]));

//        $imagemo = Imagemo::findOrFail(2);
//        dump($imagemo->commentmos()->create([
//            'body'=>'imagemo2'
//        ]));

//        $videomo = Videomo::findOrFail(1);
//        dump($videomo->commentmos()->create([
//            'body'=>'videomo1'
//        ]));



//Так загружаются(подвязываются) данные в общую таблицу при Полиморфной связи ManyToMany
//        $videomm = Videomm::findOrFail(3);
//        dump($videomm->commentmms()->create([
//            'name'=>'videomm3'
//        ]));

//        $imagemm = Imagemm::findOrFail(2);
//        dump($imagemm->commentmms()->create([
//            'name' => 'imagemm2'
//        ]));

        $videomm = Videomm::findOrFail(3);
        dump($videomm->commentmms()->delete()); //удаляем данные из таблицы "commentmms" и одновременно дополнительной связующей таблицы "commentmmables"

    }
}
