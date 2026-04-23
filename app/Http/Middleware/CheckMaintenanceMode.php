<?php

namespace App\Http\Middleware;

use App\Models\SiteSetting;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckMaintenanceMode
{
    public function handle(Request $request, Closure $next): Response
    {
        if (SiteSetting::isMaintenanceMode() && !auth()->check()) {
            return response()->view('maintenance', [], 503);
        }

        return $next($request);
    }
}
