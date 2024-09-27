<?php
declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\Polymorph\Imageoo;
use App\Models\Polymorph\Videooo;

class MyPolymorphController extends Controller
{
    public function show()
    {

  //Так загружаются(подвязываются) данные в общую таблицу при Полиморфной связи OneToOne или ManyToOne
        $image = Imageoo::findOrFail(1);
        dump($image->commentoos()->create([
            'body'=>'image1'
        ]));

        $video = Videooo::findOrFail(1);
        dump($video->commentoos()->create([
            'body'=>'video1'
        ]));

  //Так загружаются(подвязываются) данные в общую таблицу при Полиморфной связи ManyToMany


        return view('My.polymorph');
    }
}
