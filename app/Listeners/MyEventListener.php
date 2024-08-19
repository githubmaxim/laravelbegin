<?php
declare(strict_types=1);

namespace App\Listeners;

use App\Events\MyEvent;

class MyEventListener
{
    public function __construct()
    {
    }

    public function handle(MyEvent $event): void
    {
        dd($event);
    }
}
