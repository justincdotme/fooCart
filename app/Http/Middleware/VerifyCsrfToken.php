<?php namespace fooCart\Http\Middleware;

use Closure;
use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as BaseVerifier;

class VerifyCsrfToken extends BaseVerifier {

	/**
	 * Handle an incoming request.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \Closure  $next
	 * @return mixed
	 */
	public function handle($request, Closure $next)
	{
        //We can skip CSRF protection for these routes.
        $routes = array();

        foreach ($routes as $key => $route) {
            //Just proceed as if CSRF has worked.
            if($request->is($route)){
                return parent::addCookieToResponse($request, $next($request));
            }
        }

		return parent::handle($request, $next);
	}
}
