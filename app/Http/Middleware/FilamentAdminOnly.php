<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class FilamentAdminOnly
{
    public function handle(Request $request, Closure $next)
    {
        $user = auth()->user();

        if (! $user || ($user->admin ?? null) !== 1) {

            abort(403, 'Aizliegts. Administrācijai tikai');
        }

        return $next($request);
    }
}
