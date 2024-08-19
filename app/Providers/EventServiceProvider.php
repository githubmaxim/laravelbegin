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
    // на его почту ссылку для подтверждения адреса электронной почты. (кроме этого нужно еще настроить почту в файлах ".env" и "mail.php")
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
    ];

    public function boot(): void
    {
    }
}
