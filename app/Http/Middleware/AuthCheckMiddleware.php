<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class AuthCheckMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Case: use blade template
        if (Auth::check()) {
            $user = Auth::user();

            return $next($request);
        }

        // Case: use JWT token
        // $token = $request->header('Authorization');

        // if ($token) {
        //     $token = str_replace('Bearer ', '', $token);

        //     try {
        //         $user = JWTAuth::parseToken()->authenticate();  // Use your own token verification logic
        //         if ($user) {
        //             Auth::login($user);
        //             return $next($request);
        //         }
        //     } catch (\Exception $e) {
        //         // Handle token verification failure, maybe return a response with an error
        //         return response()->json(['error' => 'Unauthorized'], 401);
        //     }
        // }
        return redirect()->route('login');
    }
}
