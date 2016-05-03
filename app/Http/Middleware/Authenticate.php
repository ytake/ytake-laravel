<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Auth\AuthManager;

/**
 * Class Authenticate
 * プロジェクト自体でFacadeの利用登録を削除している為、
 * デフォルトのファサード利用箇所を全て書き換え
 */
class Authenticate
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
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure                 $next
     * @param  string|null              $guard
     *
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        if ($this->auth->guard($guard)->guest()) {
            if ($request->ajax() || $request->wantsJson()) {
                return response('Unauthorized.', 401);
            }

            return redirect()->guest('login');
        }

        return $next($request);
    }
}
