<?php

namespace App\Providers;

use App\Models\Navlink;
use App\Models\Setting;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        View::share([
            'settings' => Setting::query()->first(),
            'navLinks' => Navlink::query()
                ->with(['children' => fn ($query) => $query->where('is_active', true)->orderBy('order', 'asc')])
                ->whereNull('parent_id')
                ->where('is_active', true)
                ->orderBy('order', 'asc')
                ->get(),
        ]);
    }
}
