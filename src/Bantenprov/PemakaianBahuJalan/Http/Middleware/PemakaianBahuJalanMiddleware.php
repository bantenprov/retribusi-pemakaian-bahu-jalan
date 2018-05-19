<?php namespace Bantenprov\PemakaianBahuJalan\Http\Middleware;

use Closure;

/**
 * The PemakaianBahuJalanMiddleware class.
 *
 * @package Bantenprov\PemakaianBahuJalan
 * @author  bantenprov <developer.bantenprov@gmail.com>
 */
class PemakaianBahuJalanMiddleware
{

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        return $next($request);
    }
}
