<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Spatie\Health\Checks\Checks\CacheCheck;
use Spatie\Health\Checks\Checks\DatabaseCheck;
use Spatie\Health\Checks\Checks\DebugModeCheck;
use Spatie\Health\Checks\Checks\HorizonCheck;
use Spatie\Health\Checks\Checks\RedisCheck;
use Spatie\Health\Checks\Checks\ScheduleCheck;
use Spatie\Health\Checks\Checks\UsedDiskSpaceCheck;
use Spatie\Health\Facades\Health;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register()
    {
    }

    /**
     * Bootstrap any application services.
     */
    public function boot()
    {
        Health::checks([
            DebugModeCheck::new(),
            UsedDiskSpaceCheck::new(),
            DatabaseCheck::new(),
            //            RedisCheck::new(),
            CacheCheck::new(),
            ScheduleCheck::new()->heartbeatMaxAgeInMinutes(2),
            //            HorizonCheck::new(),

            // PingCheck::new()
            //     ->name('Proxmox')
            //     ->url(config('services.proxmox.ping_url'))
            //     ->failureMessage('Proxmox is not reachable'),
        ]);
    }
}
