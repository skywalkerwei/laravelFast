<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Log;

class RequestLogMiddleware
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

        if (env('REQUEST_DEBUG',true) ) {
                $data = [];
                $data['method'] = $request->method();
                $data['request_url'] = $request->path();
                $data['method'] = $request->getRealMethod();
                $data['request_ip'] = $request->ip();
                $data['data'] = json_encode($request->input(),JSON_UNESCAPED_UNICODE);
                $data['Authorization'] = $request->header('Authorization');
                Log::channel('request')->info($data);
        }
        $response = $next($request);

        if (env('REQUEST_DEBUG',true) ) {
            $data = [];
            $output = json_decode($response->getContent(), true);
            Log::channel('request')->info([$output]);
        }

        return $response;


    }
}
