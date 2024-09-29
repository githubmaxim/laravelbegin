<?php
declare(strict_types=1);

namespace App\Console\Commands;

use App\Models\Polymorph\Imagemo;
use App\Models\Polymorph\Imageoo;
use App\Models\Polymorph\Videomo;
use App\Models\Polymorph\Videooo;
use Illuminate\Console\Command;

class PolymorphCommand extends Command
{
    protected $signature = 'polymorph:go';

    protected $description = 'Command description';

    public function handle(): void
    {
//        $image = Imageoo::findOrFail(1);
//        dump($image->commentoos()->create([
//            'body'=>'image1'
//        ]));

//        $video = Videooo::findOrFail(1);
//        dump($video->commentoos()->create([
//            'body'=>'video1'
//        ]));
//
//        $imagemo = Imagemo::findOrFail(1);
//        dump($imagemo->commentmos()->create([
//                'body'=>'imagemo1'
//        ]));

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
    }
}
