<?php

namespace App\Http\Middleware;

use App\Models\Setting;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckMaintenanceMode
{
    /**
     * Handle an incoming request.
     *
     * @param  Closure(Request): (Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $settings = Setting::query()->first();

        if ($settings?->maintenance_mode) {
            return response()->view('errors.503', [
                'settings' => $settings,
            ], 503);
        }

        return $next($request);
    }
}
