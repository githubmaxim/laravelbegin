<?php
declare(strict_types=1);

namespace App\Events;

use App\Models\Country;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

//class MyEvent
class MyEvent implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

//    public int $count = 100;
//    public function __construct(){}
    //или
//    public function __construct(public int $count = 100){}

    //или так (передадутся и $count u $ww)
//    public string $count = 'ten';
//    public function __construct(public int $ww = 10){}
    //или так (c моделью)
    public function __construct(public Country $country){}


    public function broadcastOn(): array
    {
        return [
            new PrivateChannel('channel-name')
        ];
    }
}
