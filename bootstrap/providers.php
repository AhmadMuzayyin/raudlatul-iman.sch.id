<?php

use App\Providers\AppServiceProvider;
use App\Providers\AppViewProvider;
use App\Providers\Filament\AdminPanelProvider;
use App\Providers\ViewProvider;

return [
    AppServiceProvider::class,
    AppViewProvider::class,
    AdminPanelProvider::class,
    ViewProvider::class,
];
