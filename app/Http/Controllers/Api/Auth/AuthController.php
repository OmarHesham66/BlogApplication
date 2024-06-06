<?php

namespace App\Http\Controllers\Api\Auth;

use App\Services\RegisterService;
use App\Http\Requests\LoginRequest;
use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterRequest;

class AuthController extends Controller
{
    public function __construct(protected RegisterService $registerService)
    {
    }
    public function login(LoginRequest $request)
    {

        if ($token = auth('api')->attempt($request->validated())) {
            $user = auth('api')->user();
            return response()->json([
                'token' => $token,
                'user' => $user,
                'code' => 200,
                'message' => 'Login successful',
            ], 200);
        }
        return response()->json([
            'code' => 401,
            'message' => 'Unauthorized !!'
        ], 401);
    }
    public function register(RegisterRequest $request)
    {
        $data = $request->validated();
        $data['password'] = bcrypt($request->password);
        $token = $this->registerService->register('api', $data);
        return response()->json([
            'token' => $token,
            'user' => auth('api')->user(),
            'code' => 200,
            'message' => 'Register successful',
        ], 200);
    }
    public function refresh()
    {
        $token = auth('api')->refresh();
        return response()->json([
            'token' => $token,
            'code' => 200,
            'message' => 'Refresh token successful',
        ], 200);
    }
    public function logout()
    {
        auth('api')->logout();
        return response()->json([
            'code' => 200,
            'message' => 'Logout successful',
        ], 200);
    }
}
