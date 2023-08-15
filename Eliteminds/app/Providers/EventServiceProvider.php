<?php

namespace App\Providers;
use App\Events\PackageCounter;
use App\Listeners\IncreaseCounter;
use App\Events\CertificationCounter;
use App\Listeners\CertificationIncreaseCounter;
use Illuminate\Support\Facades\Event;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        'Illuminate\Auth\Events\Login' => [
            'App\Listeners\LogSuccessfulLogin',
        ],
        'Illuminate\Auth\Events\Logout' => [
            'App\Listeners\LogSuccessfulLogout',
        ],
        PackageCounter::class => [
            IncreaseCounter::class,
        ],
        CertificationCounter::class => [
            CertificationIncreaseCounter::class,
        ],
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
