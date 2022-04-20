<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    protected function redirectTo($request)
    {
        if (! $request->expectsJson()) {
            if($request->routeis('admin.*')){
                return route('admin.login');
            }
             if($request->routeis('stagiaire.*')){
                return route('stagiaire.login');
            }
            if($request->routeis('entreprise.*')){
                return route('entreprise.login');
            }
            return redirect('/');
        }
    }
}
