<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Http\Request;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     */
    /*@ -12,6 +12,6 @@ class Authenticate extends Middleware
     */
    protected function redirectTo(Request $request): ?string
    {
        return $request->expectsJson() ? null : route('index');
    }
}
