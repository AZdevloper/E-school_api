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
    public function store(LoginRequest $request): Response
    {
        $request->authenticate();

        $request->session()->regenerate();

        // return response()->noContent();

        return response(
            UserResource::make($request->user())->jsonSerialize(),  
            Response::HTTP_OK
        );
        // $session = $request->session();
        // $response = response()->noContent();

        // $cookies = collect($response->headers->getCookies())
        // ->map(function ($cookie) {
        //     return [
        //         'name' => $cookie->getName(),
        //         'value' => $cookie->getValue(),
        //     ];
        // })
        // ->keyBy('name');

        // $xsrfToken = $cookies->get('XSRF-TOKEN');
        // $laravelSession = $cookies->get(config('session.cookie'));

        // return response()->json([
        //     'XSRF-TOKEN' => $xsrfToken['value'],
        //     config('session.cookie') => $laravelSession['value'],
        // ]);
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
