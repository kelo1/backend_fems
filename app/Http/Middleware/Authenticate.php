<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Auth\AuthenticationException; 

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    protected function redirectTo($request)
    {
        if (!$request->expectsJson()) {
            return route('login');
        }
    }

    /**
     * Handle an unauthenticated user.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  array  $guards
     * @return void
     */
    /* protected function unauthenticated($request, array $guards)
    {
        throw new HttpResponseException(response()->json(['message' => 'Unauthenticated.'], 401));
    } */

    protected function unauthenticated($request, array $guards)
    {
        \Log::info('Unauthenticated request', [
            'url' => $request->fullUrl(),
            'headers' => $request->headers->all(),
            'guards' => $guards,
        ]);

        throw new AuthenticationException(
            'Unauthenticated.', $guards, $this->redirectTo($request)
        );
    }
}
