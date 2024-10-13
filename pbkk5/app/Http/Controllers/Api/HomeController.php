<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

/**
 * @OA\Post(
 *   path="/api/home",
 *   summary="Home data",
 *   description="Returns a message with your name",
 *   tags={"Home"},
 *   @OA\Parameter(
 *      name="name",
 *      in="query",
 *      description="Provide your name",
 *      required=true,
 *      @OA\Schema(
 *         type="string"
 *      )
 *   ),
 *   @OA\Response(
 *     response=200, 
 *     description="Success",
 *     @OA\MediaType(
 *         mediaType="application/json",
 *     ),
 *     @OA\Schema(
 *         type="string"
 *     )
 *   ),
 *   @OA\Response(
 *     response=400, 
 *     description="Bad Request"
 *   )
 * )
 */
class HomeController extends Controller
{
    public function index(Request $request)
    {
        return response()->json([
            'name' => $request->input('name'),
            'message' => 'Hello World',
        ]);
    }
}
