<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class hasApiKey
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        //  vérifie qu’un champ “x-api-key” est passé en header, qu’elle correspond à une clé API existante et qui récupère le user en fonction
// Check if the x-api-key header is present
        $apiKey = $request->header('x-api-key');

        if (!$apiKey) {
            return response()->json(['error' => 'API key is missing'], 401);
        }

        // Find the API key in the database
        $apiKeyRecord = ApiKey::where('key', $apiKey)->first();

        if (!$apiKeyRecord) {
            return response()->json(['error' => 'Invalid API key'], 401);
        }

        // Retrieve the user associated with the API key
        $user = $apiKeyRecord->user;

        if (!$user) {
            return response()->json(['error' => 'User not found'], 401);
        }

        // Log the user in
        Auth::login($user);

        return $next($request);
    }
}
