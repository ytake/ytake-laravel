<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Auth\AuthManager;

/**
 * Class RedirectIfAuthenticated
 */
class RedirectIfAuthenticated
{
    /** @var \Illuminate\Auth\AuthManager */
    protected $auth;

    /**
     * Authenticate constructor.
     *
     * @param \Illuminate\Auth\AuthManager $auth
     */
    public function __construct(AuthManager $auth)
    {
        $this->auth = $auth;
    }

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        if ($this->auth->guard($guard)->check()) {
            return redirect('/');
        }

        return $next($request);
    }
}
