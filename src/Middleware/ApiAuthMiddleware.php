<?php
namespace MaXiaofei\OpencenterForLaravel\Middleware;

use Closure;

class ApiAuthMiddleware
{
    /**
     * handle 123
     * @author MaXiaofei<xiaofeima@uqiauto.com>
     * @date   2020/3/31 20:31
     * @param         $request
     * @param Closure $next
     * @return mixed|string
     */
    public function handle($request, Closure $next)
    {
        // $status true/false 当满足条件时会进入 if 操作，否则按照 laravel 预定的执行。
        $status = true;
        if($status)
        {
            return 'api中间件验证不通过';
        }
        return $next($request);
    }
}
