<?php
declare(strict_types=1);

namespace App\Providers;

use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Support\ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * Тут мы регистрируем события и их слушателей
     *
     * @var array<class-string, array<int, class-string>>
     */
    //это событие (Registered::class) и обработчик событий (SendEmailVerificationNotification::class) являются
    // внутренними встроенными классами, и их регистрация тут нужна для автоматической отправки клиенту
    // сообщения на его почту об успешной аутентификации на нашем сайте (кроме этого, я думаю, нужно еще настроить почту в файле ".env" и еще где-то???)
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
    ];

    public function boot(): void
    {
    }
}
