<?php

namespace Bicycle\Modules\Domain\Core\Http\Middleware;

use Bicycle\Modules\Domain\Core\Exceptions\CustomException;
use Closure;
use Exception;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckUserIsAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param Closure(Request): (Response) $next
     * @throws Exception
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (
            auth('api')->check() &&
            auth('api')->user()->hasRole('administrator')
        ) {
            return $next($request);
        }


        return (new CustomException())->message(
            'You do not have permission to access this page',
            Response::HTTP_FORBIDDEN);

    }
}
