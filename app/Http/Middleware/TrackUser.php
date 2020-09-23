<?php

namespace App\Http\Middleware;

use Closure;
use Exception;
use Illuminate\Http\Request;

class TrackUser
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        try {
            $repository = resolve('App\Repositories\TrackUserRepository');

            $repository->addUser([
                'ip'   => request()->ip(),
                'date' => now(),
            ]);
        } catch (Exception $error) {
            return $error->getMessage();
        }

        return $next($request);
    }
}

