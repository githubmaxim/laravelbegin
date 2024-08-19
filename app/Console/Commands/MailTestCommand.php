<?php
declare(strict_types=1);

namespace App\Console\Commands;

use App\Models\ForMail;
use Illuminate\Console\Command;

class MailTestCommand extends Command
{
    protected $signature = 'mail:go';

    protected $description = 'Command description';

    public function handle(): void
    {
        ForMail::factory('100')->create(); //заполняем БД 100 записями
    }
}
