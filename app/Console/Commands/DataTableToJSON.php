<?php
declare(strict_types=1);

namespace App\Console\Commands;

use App\Models\Country;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Storage;

class DataTableToJSON extends Command
{
    protected $signature = 'data:tojson';

    protected $description = 'Command description';

    public function handle(): void
    {
        $path = Storage::path('fffile.json');
        dd($path);
//        $contry = Country::all();
//        if (!Storage::put('fffile.json', json_encode($contry, JSON_PRETTY_PRINT))){
//            dd('Error while uploading file');
//        };
    }
}
