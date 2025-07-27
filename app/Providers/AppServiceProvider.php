<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Whitecube\NovaPage\Pages\Manager;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot(Manager $pages)
    {
        $pages->register('option', 'contact', \App\Nova\Templates\Contact::class);
        $pages->register('option', 'popup', \App\Nova\Templates\Popup::class);
    }
}
