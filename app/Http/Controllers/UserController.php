<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserStoreRequest;
use App\Http\Requests\UserUpdateRequest;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * @OA\Get(
     *     tags={"/user"},
     *     summary="Display a listing of the resource",
     *     description="Get all users on database",
     *     path="/user",
     *     security={{"bearerAuth": {}}},
     *     @OA\Response(
     *          response="200", description="List of users"
     *     )
     * )
     *
     * @return User
     */
    public function index()
    {
        return User::all();
    }

    /**
     * @OA\Post(
     *     tags={"/user"},
     *     summary="Store a newly created resource in storage.",
     *     description="Post user on database",
     *     path="/user",
     *     security={{"bearerAuth": {}}},
     *     @OA\RequestBody(
     *          required=true,
     *          @OA\JsonContent(
     *              type="object",
     *              @OA\Property(property="name", type="string"),
     *              @OA\Property(property="email", type="string"),
     *              @OA\Property(property="profile", type="string"),
     *              @OA\Property(property="institute", type="string"),
     *              @OA\Property(property="password", type="string")
     *          )
     *     ),
     *     @OA\Response(
     *          response="200", description="List of user"
     *     )
     * )
     *
     * @param UserStoreRequest  $request
     * @return User
     */
    public function store(UserStoreRequest $request)
    {
        return User::create($request->all());
    }

    /**
     *@OA\Get(
     *     tags={"/user"},
     *     summary="Display a specified resource",
     *     description="Show user",
     *     path="/user/{id}",
     *     security={{"bearerAuth": {}}},
     *      @OA\Parameter(
     *          description="User id",
     *          in="path",
     *          name="id",
     *          required=true,
     *          @OA\Schema(
     *              type="integer",
     *              format="int64"
     *          ),
     *     ),
     *     @OA\Response(
     *          response="200", description="Show user"
     *     )
     * )
     *
     * @param string $id
     * @return User
     */
    public function show(string $id)
    {
        return User::findOrFail($id);
    }

    /**
     * @OA\Put(
     *     tags={"/user"},
     *     summary="Update the specified resource in storage.",
     *     description="Update user on database",
     *     path="/user/{id}",
     *     security={{"bearerAuth": {}}},
     *     @OA\Parameter(
     *          description="User id",
     *          in="path",
     *          name="id",
     *          required=true,
     *          @OA\Schema(
     *              type="integer",
     *              format="int64"
     *          ),
     *     ),
     *     @OA\RequestBody(
     *          required=true,
     *          @OA\JsonContent(
     *              type="object",
     *              @OA\Property(property="name", type="string"),
     *              @OA\Property(property="email", type="string"),
     *              @OA\Property(property="profile", type="string"),
     *              @OA\Property(property="institute", type="string"),
     *              @OA\Property(property="password", type="string")
     *          )
     *     ),
     *     @OA\Response(
     *          response="200", description="Update of user"
     *     )
     * )
     *
     * @param UserUpdateRequest $request
     * @param string $id
     * @return User
     */
    public function update(UserUpdateRequest $request, string $id)
    {
        $user = User::findOrFail($id);
        $user->update($request->all());
        return $user;
    }

    /**
     * @OA\Delete(
     *     tags={"/user"},
     *     summary=" Remove the specified resource from storage.",
     *     description="Remove a user on database",
     *     path="/user/{id}",
     *     security={{"bearerAuth": {}}},
     *     @OA\Parameter(
     *          description="user Id",
     *          in="path",
     *          name="id",
     *          required=true,
     *          @OA\Schema(
     *              type="integer",
     *              format="int64"
     *          ),
     *     ),
     *     @OA\Response(
     *          response="204", description="user deleted"
     *     )
     * )
     *
     */
    public function destroy(string $id)
    {
        return User::destroy($id);
    }
}
