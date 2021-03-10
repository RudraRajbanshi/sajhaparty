<?php

namespace App\Providers;

use App\Events\GenerateFormCodeEvent;
use Illuminate\Support\Facades\Event;
use App\Events\MembershipCreatedEvent;
use Illuminate\Auth\Events\Registered;
use App\Events\UserCreateOrUpdateEvent;
use App\Listeners\MakeBarcodePdfListener;
use App\Listeners\MakeMembershipFormListener;
use App\Listeners\ActivityLogOfUserCreateOrUpdateListeners;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
        MembershipCreatedEvent::class =>[
            MakeMembershipFormListener::class
        ],
        GenerateFormCodeEvent::class => [
            MakeBarcodePdfListener::class
        ],
        UserCreateOrUpdateEvent::class => [
            ActivityLogOfUserCreateOrUpdateListeners::class
        ]
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();

        //
    }
}
