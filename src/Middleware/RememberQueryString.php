<?php

namespace MeerkatMcr\SimpleQueryMemory\Middleware;

use Closure;
use Illuminate\Http\Request;

class RememberQueryString {
    public function handle(Request $request, Closure $next, string $key)
    {
        $request->session()->put(
            "query_string.{$key}",
            $request->all()
        );

        return $next($request);
    }
}
