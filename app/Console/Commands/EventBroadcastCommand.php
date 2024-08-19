<?php
declare(strict_types=1);

namespace App\Console\Commands;

use App\Events\MyEvent;
use App\Models\Country;
use Illuminate\Console\Command;

class EventBroadcastCommand extends Command
{
    protected $signature = 'event:broadcast';

    protected $description = 'Command description';

    public function handle(): void
    {
        event(new MyEvent(Country::findOrFail(1)));
//        event(new MyEvent());
    }
}
