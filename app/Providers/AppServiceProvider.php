<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Http\Middleware\ContentSecurityPolicy;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function boot()
    {
        // Register middleware globally
        $this->app['router']->middleware('csp', ContentSecurityPolicy::class);
    }

}
