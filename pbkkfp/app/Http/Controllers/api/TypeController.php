<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Type;
use App\Http\Resources\TypeResource;
use Illuminate\Support\Facades\Validator;

class TypeController extends Controller{

        /**
     * @OA\Get(
     *  path="/api/types",
     *  tags={"Type"},
     *  summary="Get List of Types",
     *  description="Fetches all available food types",
     *  operationId="getTypes",
     *  @OA\Response(
     *      response=200,
     *      description="Successful retrieval of types",
     *  ),
     *  @OA\Response(
     *      response=404,
     *      description="No types found"
     *  )
     * )
     */

    public function index(){
        $types = Type::get();

        if($types->count()>0){
            return TypeResource::collection($types);
        }

        else{
            return response()->json(['message' => 'No record available'], 200);
        }
    }

    /**
     * @OA\Post(
     *     path="/api/types",
     *     tags={"Type"},
     *     summary="Store type",
     *     description="To Make New Type of Food",
     *     operationId="types/store",
     *     @OA\RequestBody(
     *          required=true,
     *          description="form type",
     *      ),
     *     @OA\Response(
     *         response="default",
     *         description=""
     *     )
     * )
     */

    public function store(Request $request){
        $validator = Validator::make($request->all(), [
            'name' => 'required',
        ]);

        if($validator->fails()){
            return response()->json([
                'message' => 'All fields are mandatory',
                'error' => $validator->messages(),
            ], 422);
        }

        $request->validate([
            'name' => 'required',
        ]);

        $types = Type::create([
            'name' => $request->name,
        ]);

        return response()->json([
            'message' => 'Type Created Successfullly', 
            'data' => new TypeResource($types)
        ], 200);
    }

        /**
     * @OA\Get(
     *  path="/api/types/{id}",
     *  tags={"Type"},
     *  summary="Get a specific type",
     *  description="Retrieve a single type by ID",
     *  operationId="getTypeById",
     *  @OA\Parameter(
     *      name="id",
     *      in="path",
     *      required=true,
     *      description="ID of the type",
     *      @OA\Schema(type="integer")
     *  ),
     *  @OA\Response(
     *      response=200,
     *      description="Successful retrieval of the type",
     *  ),
     *  @OA\Response(
     *      response=404,
     *      description="Type not found"
     *  )
     * )
     */

    public function show($id)
    {
        $type = Type::find($id);

        if ($type) {
            return new TypeResource($type);
        } else {
            return response()->json(['message' => 'No record available'], 404);
        }
    }

        /**
     * @OA\Put(
     *     path="/api/types/{id}",
     *     tags={"Type"},
     *     summary="Update a type",
     *     description="Edit an existing food type by ID",
     *     operationId="updateType",
     *     @OA\Parameter(
     *          name="id",
     *          in="path",
     *          required=true,
     *          description="ID of the type to be updated",
     *          @OA\Schema(type="integer")
     *     ),
     *     @OA\RequestBody(
     *          required=true,
     *          description="Type data to update",
     *          @OA\JsonContent(
     *              required={"name"},
     *              @OA\Property(property="name", type="string")
     *          )
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Type updated successfully",
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Type not found"
     *     )
     * )
     */

    public function update(Request $request, Type $type){
        $validator = Validator::make($request->all(), [
            'name' => 'required',
        ]);

        if($validator->fails()){
            return response()->json([
                'message' => 'All fields are mandatory',
                'error' => $validator->messages(),
            ], 422);
        }

        $request->validate([
            'name' => 'required',
        ]);

        $type->update([
            'name' => $request->name,
        ]);

        return response()->json([
            'message' => 'Type Updated Successfullly', 
            'data' => new TypeResource($type)
        ], 200);
    }

    /**
     * @OA\Delete(
     *  path="/api/types/{id}",
     *  tags={"Type"},
     *  summary="Delete Type",
     *  description="Delete Type of Food",
     *  operationId="types",
     *  @OA\Response(
     *  response="default",
     *  description="return array model for type"
     *  )
     * )
     */

    public function destroy(Type $type){
        $type->delete();
        return response()->json([
            'message' => 'Type Deleted Successfullly', 
        ], 200);
    }
}