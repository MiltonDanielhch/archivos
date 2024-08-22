<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\Request as RequestModel;
class Log
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        RequestModel::create([
            'ip' => request()->ip(),
            'user_agent' => request()->userAgent(),
            'device' => isMobile(request()->userAgent()) ? 'mobile' : 'desktop',
            'url' => request()->url(),
            'date' => date('Y-m-d H:i:s'),
        ]);
        return $next($request);
    }
}
