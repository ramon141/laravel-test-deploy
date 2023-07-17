<?php

namespace App\Http\Controllers;

use App\Models\Period;
use Illuminate\Http\Request;

class PeriodController extends Controller
{
    /**
     * @OA\Get(
     *     tags={"/period"},
     *     summary="Display a listing of the resource",
     *     description="Get all period on database",
     *     path="/period",
     *     security={{"bearerAuth": {}}},
     *     @OA\Response(
     *          response="200", description="List of period"
     *     )
     * )
     *
     * @return Period
     */
    public function index()
    {
        return Period::with('preOffer.turma')->get();
    }

    /**
     *@OA\Post(
     *     tags={"/period"},
     *     summary="Store a newly created resource in storage.",
     *     description="Post period on database",
     *     path="/period",
     *     security={{"bearerAuth": {}}},
     *     @OA\RequestBody(
     *          required=true,
     *          @OA\JsonContent(
     *              type="object",
     *              @OA\Property(property="name", type="string"),
     *              @OA\Property(property="start_request", type="datetime"),
     *              @OA\Property(property="end_request", type="datetime"),
     *              @OA\Property(property="start_indication", type="datetime"),
     *              @OA\Property(property="end_indication", type="datetime")
     *          )
     *     ),
     *     @OA\Response(
     *          response="200", description="List of period"
     *     )
     * )
     *
     * @param Request $request
     * @return Period
     */
    public function store(Request $request)
    {
        return Period::create($request->all());
    }

    /**
     * @OA\Get(
     *     tags={"/period"},
     *     summary="Display a specified resource",
     *     description="Show period",
     *     path="/period/{id}",
     *     security={{"bearerAuth": {}}},
     *      @OA\Parameter(
     *          description="Period id",
     *          in="path",
     *          name="id",
     *          required=true,
     *          @OA\Schema(
     *              type="integer",
     *              format="int64"
     *          ),
     *     ),
     *     @OA\Response(
     *          response="200", description="Show period"
     *     )
     * )
     *
     * @param string $id
     * @return Period
     */
    public function show(string $id)
    {
        return Period::findOrFail($id);
    }

    /**
     * @OA\Put(
     *     tags={"/period"},
     *     summary="Update the specified resource in storage.",
     *     description="Update period on database",
     *     path="/period/{id}",
     *     security={{"bearerAuth": {}}},
     *     @OA\Parameter(
     *          description="Period id",
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
     *              @OA\Property(property="start_request", type="datetime"),
     *              @OA\Property(property="end_request", type="datetime"),
     *              @OA\Property(property="start_indication", type="datetime"),
     *              @OA\Property(property="end_indication", type="datetime")
     *          )
     *     ),
     *     @OA\Response(
     *          response="200", description="Update of period"
     *     )
     * )
     *
     * @param Request $request
     * @param string $id
     * @return Period
     */
    public function update(Request $request, string $id)
    {
        $period = Period::findOrFail($id);

        $period->update($request->all());

        return $period;
    }

    /**
     * @OA\Delete(
     *     tags={"/period"},
     *     summary=" Remove the specified resource from storage.",
     *     description="Remove a period on database",
     *     path="/period/{id}",
     *     security={{"bearerAuth": {}}},
     *     @OA\Parameter(
     *          description="Period Id",
     *          in="path",
     *          name="id",
     *          required=true,
     *          @OA\Schema(
     *              type="integer",
     *              format="int64"
     *          ),
     *     ),
     *     @OA\Response(
     *          response="204", description="period deleted"
     *     )
     * )
     *
     */
    public function destroy(string $id)
    {
        return Period::destroy($id);
    }
}
