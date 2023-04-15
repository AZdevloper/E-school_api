<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\Auth\LoginRequest;

class AuthenticatedSessionController extends Controller
{
    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): JsonResponse
    {
        $request->authenticate();

        $request->session()->regenerate();

        // return response()->noContent();
        return response()->json([
            "role"=> Auth::user()->getRoleNames(),
            "permissions"=> Auth::user()->getAllPermissions()->pluck('name'),
            "api_token" =>     Auth::user()->createToken('api_token')->plainTextToken]);

        // return response(
        //     UserResource::make($request->user())->jsonSerialize(),  
        //     Response::HTTP_OK
        // );

    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): Response
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return response()->noContent();
    }
}
