<?php

namespace Masuresh124\AgreeTerms\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AgreeTermsMiddleware
{

    public function handle(Request $request, Closure $next)
    {
        $userCheck = auth()->check();
        if ($userCheck) {
            $user = auth()->user();
            if (!$user->hasAgreedTerms() && !$user->skipAgreedTerms() && !in_array($request->path(), config('agree-terms.excluded_paths'))) {
                session(['url.intended' => $request->url()]);
                return redirect()->route('agree-terms.show');
            }
        }
        return $next($request);
    }

}
