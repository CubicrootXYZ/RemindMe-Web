<?php

namespace App\Http\Middleware;

use Illuminate\Support\Facades\Auth;

class RemindMeBasicAuth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, $next)
    {
        $username = $request->getUser();
        $password = $request->getPassword();

        if (empty($username) || empty($password)) {
            return abort(401, 'Unauthenticated', ['WWW-Authenticate' => 'Basic']);
        }

        $request->attributes->add([
            'username' => $username,
            'password' => $password
        ]);

        return $next($request);
    }
}
