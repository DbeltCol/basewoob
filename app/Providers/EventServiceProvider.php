<?php

namespace App\Providers;

use App\Events\LastLogin;
use App\Events\RegisterTwoFactor;
use App\Events\TwoFactor;
use App\Listeners\RegisterLastLogin;
use App\Listeners\RegisterToken;
use App\Listeners\ValidateTwoFactor;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array<class-string, array<int, class-string>>
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],

        RegisterTwoFactor::class => [
            RegisterToken::class,
        ],

        TwoFactor::class => [
            ValidateTwoFactor::class,
        ],

        LastLogin::class => [
            RegisterLastLogin::class
        ]

    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
