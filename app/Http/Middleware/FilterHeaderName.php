<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class FilterHeaderName
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $data = app('header')->getList();

        $name = $request->route('name');

        if (collect($data)->where('header_url', $name)->isEmpty()) {
            return redirect()->back('301');
        }

        return $next($request);
    }
}
