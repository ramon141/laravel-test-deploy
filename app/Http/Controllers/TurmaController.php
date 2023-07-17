<?php

namespace App\Http\Controllers;

use App\Models\Turma;
use Illuminate\Http\Request;

class TurmaController extends Controller
{
    /**
     * @OA\Get(
     *     tags={"/turma"},
     *     summary="Display a listing of the resource",
     *     description="Get all turma on database",
     *     path="/turma",
     *     security={{"bearerAuth": {}}},
     *     @OA\Response(
     *          response="200", description="List of turma"
     *     )
     * )
     *
     * @return Turma
     */
    public function index()
    {
        return Turma::with('preOffer.period')->get();
    }

    /**
     * @OA\Post(
     *     tags={"/turma"},
     *     summary="Store a newly created resource in storage.",
     *     description="Post turma on database",
     *     path="/turma",
     *     security={{"bearerAuth": {}}},
     *     @OA\RequestBody(
     *          required=true,
     *          @OA\JsonContent(
     *              type="object",
     *              @OA\Property(property="admission_year", type="int"),
     *              @OA\Property(property="course_id", type="int")
     *          )
     *     ),
     *     @OA\Response(
     *          response="200", description="List of turma"
     *     )
     * )
     *
     * @param Request $request
     * @return Turma
     */
    public function store(Request $request)
    {
        return Turma::create($request->all());
    }

    /**
     * @OA\Get(
     *     tags={"/turma"},
     *     summary="Display a specified resource",
     *     description="Show turma",
     *     path="/turma/{id}",
     *     security={{"bearerAuth": {}}},
     *      @OA\Parameter(
     *          description="Turma id",
     *          in="path",
     *          name="id",
     *          required=true,
     *          @OA\Schema(
     *              type="integer",
     *              format="int64"
     *          ),
     *     ),
     *     @OA\Response(
     *          response="200", description="Show turma"
     *     )
     * )
     *
     * @param string $id
     * @return Turma
     */
    public function show(string $id)
    {
        return Turma::findOrFail($id);
    }

    /**
     *@OA\Put(
     *     tags={"/turma"},
     *     summary="Update the specified resource in storage.",
     *     description="Update turma on database",
     *     path="/turma/{id}",
     *     security={{"bearerAuth": {}}},
     *     @OA\Parameter(
     *          description="Turma id",
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
     *             @OA\Property(property="admission_year", type="int"),
     *             @OA\Property(property="course_id", type="int"),
     *          )
     *     ),
     *     @OA\Response(
     *          response="200", description="Update of turma"
     *     )
     * )
     *
     * @param Request $request
     * @param string $id
     * @return Turma
     */
    public function update(Request $request, string $id)
    {
        $turma = Turma::findOrFail($id);

        $turma->update($request->all());

        return $turma;
    }

    /**
     * @OA\Delete(
     *     tags={"/turma"},
     *     summary=" Remove the specified resource from storage.",
     *     description="Remove a turma on database",
     *     path="/turma/{id}",
     *     security={{"bearerAuth": {}}},
     *     @OA\Parameter(
     *          description="Turma Id",
     *          in="path",
     *          name="id",
     *          required=true,
     *          @OA\Schema(
     *              type="integer",
     *              format="int64"
     *          ),
     *     ),
     *     @OA\Response(
     *          response="204", description="turma deleted"
     *     )
     * )
     *
     */
    public function destroy(string $id)
    {
        return Turma::destroy($id);
    }
}
