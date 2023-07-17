<?php

namespace App\Http\Controllers;

use App\Models\PreOffer;
use Illuminate\Http\Request;

class PreOfferController extends Controller
{
    /**
     * @OA\Get(
     *     tags={"/preOffer"},
     *     summary="Display a listing of the resource",
     *     description="Get all pre-offer on database",
     *     path="/preOffer",
     *     security={{"bearerAuth": {}}},
     *     @OA\Response(
     *          response="200", description="List of pre-offer"
     *     )
     * )
     *
     * @return PreOffer::all()
     */
    public function index()
    {
        return PreOffer::with('turma')->get();
    }

    /**
     * @OA\Post(
     *     tags={"/preOffer"},
     *     summary="Store a newly created resource in storage.",
     *     description="Post pre-offer on database",
     *     path="/preOffer",
     *     security={{"bearerAuth": {}}},
     *     @OA\RequestBody(
     *          required=true,
     *          @OA\JsonContent(
     *              type="object",
     *              @OA\Property(property="date", type="date"),
     *              @OA\Property(property="shift", type="string"),
     *              @OA\Property(property="formatType", type="string"),
     *              @OA\Property(property="turma_id", type="integer"),
     *              @OA\Property(property="period_id", type="integer"),
     *              @OA\Property(property="discipline_id", type="integer"),
     *              @OA\Property(property="siap_coordenador", type="string"),
     *              @OA\Property(property="this_is_pro_discipline", type="bool")
     *          )
     *     ),
     *     @OA\Response(
     *          response="200", description="List of pre-offer"
     *     )
     * )
     *
     * @param Request $request
     * @return PreOffer
     */
    public function store(Request $request)
    {
        return PreOffer::create($request->all());
    }

    /**
     *@OA\Get(
     *     tags={"/preOffer"},
     *     summary="Display a specified resource",
     *     description="Show pre-offer",
     *     path="/preOffer/{id}",
     *     security={{"bearerAuth": {}}},
     *      @OA\Parameter(
     *          description="PreOffer id",
     *          in="path",
     *          name="id",
     *          required=true,
     *          @OA\Schema(
     *              type="integer",
     *              format="int64"
     *          ),
     *     ),
     *     @OA\Response(
     *          response="200", description="Show pre-offer"
     *     )
     * )
     *
     * @param string $id
     * @return PreOffer
     */
    public function show(string $id)
    {
        return PreOffer::findOrFail($id);
    }

    /**
     * @OA\Put(
     *     tags={"/preOffer"},
     *     summary="Update the specified resource in storage.",
     *     description="Update pre-offer on database",
     *     path="/preOffer/{id}",
     *     security={{"bearerAuth": {}}},
     *     @OA\Parameter(
     *          description="PreOffer id",
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
     *              @OA\Property(property="date", type="date"),
     *              @OA\Property(property="shift", type="string"),
     *              @OA\Property(property="formatType", type="string"),
     *              @OA\Property(property="turma_id", type="integer"),
     *              @OA\Property(property="period_id", type="integer"),
     *              @OA\Property(property="siap_coordenador", type="string"),
     *              @OA\Property(property="this_is_pro_disciplina", type="bool")
     *          )
     *     ),
     *     @OA\Response(
     *          response="200", description="Update of pre-offer"
     *     )
     * )
     *
     * @param Request $request
     * @param string $id
     * @return PreOffer
     */
    public function update(Request $request, string $id)
    {
        $preOffer = PreOffer::findOrFail($id);

        $preOffer->update($request->all());

        return $preOffer;
    }

    /**
     * @OA\Delete(
     *     tags={"/preOffer"},
     *     summary=" Remove the specified resource from storage.",
     *     description="Remove a pre-offer on database",
     *     path="/preOffer/{id}",
     *     security={{"bearerAuth": {}}},
     *     @OA\Parameter(
     *          description="PreOffer Id",
     *          in="path",
     *          name="id",
     *          required=true,
     *          @OA\Schema(
     *              type="integer",
     *              format="int64"
     *          ),
     *     ),
     *     @OA\Response(
     *          response="204", description="pre-offer deleted"
     *     )
     * )
     *
     */
    public function destroy(string $id)
    {
        return PreOffer::destroy($id);
    }
}
