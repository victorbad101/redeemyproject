<?php
declare(strict_types=1);

namespace App\Http\Middleware;

use Closure;

class CheckIfAuthor
{
    public function handle($request, Closure $next)
    {
        if (auth()->check() && auth()->user()->isAdmin()) {
            return $next($request);
        }

        return redirect('/dashboard');
    }
}