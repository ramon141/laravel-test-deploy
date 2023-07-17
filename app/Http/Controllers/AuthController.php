<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{

    /**
     * @OA\Post(
     *     tags={"Athentication"},
     *     summary="Login",
     *     description="Route to login to the application",
     *     path="/login",
     *     @OA\RequestBody(
     *          required=true,
     *          @OA\JsonContent(
     *              type="object",
     *              @OA\Property(property="email", type="string"),
     *              @OA\Property(property="password", type="string")
     *          )
     *     ),
     *     @OA\Response(
     *          response="200", description="List of pre-offer"
     *     )
     * )
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function login(Request $request)
    {
        $credentials = $request->only(['email', 'password']);

        if (!$token = auth('api')->attempt($credentials)) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        return $this->respondWithToken($token);
    }

    /**
     * @OA\Post(
     *     tags={"Athentication"},
     *     summary="Who i'm?",
     *     description="Route to return the logged in user",
     *     path="/me",
     *     security={{"bearerAuth": {}}},
     *     @OA\Response(
     *          response="200", description="A User"
     *     )
     * )
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function me()
    {
        return response()->json(auth()->user());
    }

    /**
     * @OA\Post(
     *     tags={"Athentication"},
     *     summary="Logout",
     *     description="Make the token invalid",
     *     path="/logout",
     *     security={{"bearerAuth": {}}},
     *     @OA\Response(
     *          response="200", description="A User"
     *     )
     * )
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function logout()
    {
        auth()->logout();

        return response()->json(['message' => 'Successfully logged out']);
    }

    /**
     * @OA\Post(
     *     tags={"Athentication"},
     *     summary="Generate a new token",
     *     description="Generate a new token",
     *     path="/refresh",
     *     security={{"bearerAuth": {}}},
     *     @OA\Response(
     *          response="200", description="A User"
     *     )
     * )
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function refresh()
    {
        return $this->respondWithToken(auth()->refresh());
    }


    /**
     * Get the token array structure.
     *
     * @param  string $token
     *
     * @return \Illuminate\Http\JsonResponse
     */
    protected function respondWithToken($token)
    {
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => auth('api')->factory()->getTTL() * 60
        ]);
    }
}
