<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Driver;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\JsonResponse;

class DriverController extends Controller
{
    public function loginDriver(Request $request): JsonResponse
    {
    $credentials = $request->only('app_username', 'password');

    // Manually validate the user's credentials
    $user = Auth::guard('drivers')->getProvider()->retrieveByCredentials($credentials);

    if ($user && Auth::guard('drivers')->getProvider()->validateCredentials($user, $credentials)) {
        // Authentication successful, generate a token
        $token = $user->createToken('MyApp')->plainTextToken;

        return response()->json(['access_token' => $token, 'token_type' => 'Bearer' ,'user' => $user], 200);
    }

    return response()->json(['message' => 'Invalid credentials'], 401);
    }

    public function driverDetails(): Response
    {
        $user = Auth::guard('drivers')->user();
        return response(['data' => $user], 200);
    }

    public function driverlogout(): Response
    {
        $user = Auth::guard('drivers')->user();
        $user->currentAccessToken()->delete();

        return response(['data' => 'User Logout successfully.'], 200);
    }


}
