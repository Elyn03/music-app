<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;
use App\Models\ApiKey;

class hasApiKey
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $apiKey = $request->header('x-api-key');

        // apikey in header ?
        if (!$apiKey) {
            return response()->json(['error' => 'API key missing'], 401);
        }

        $apiKeyRecord = ApiKey::where('key', $apiKey)->first();

        // apikey in database ?
        if (!$apiKeyRecord) {
            return response()->json(['error' => 'API key invalid'], 401);
        }

        $user = $apiKeyRecord->user;

        // user's apikey ?
        if (!$user) {
            return response()->json(['error' => 'User not found'], 401);
        }

        // Log the user in
        Auth::login($user);

        return $next($request);
    }
}
