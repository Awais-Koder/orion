<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Mixins\BlueprintMixin;
use Illuminate\Database\Schema\Blueprint;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        Blueprint::mixin(new BlueprintMixin());
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
