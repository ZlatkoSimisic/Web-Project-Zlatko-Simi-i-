<?php
/**
 * @OA\Get(
 *     path="/tools",
 *     tags={"tools"},
 *     summary="Get all tools",
 *     @OA\Response(
 *         response=200,
 *         description="Array of all tools in the database"
 *     )
 * )
 */
Flight::route('GET /tools', function(){
    Flight::json(Flight::toolService()->get_all_tools());
});

/**
 * @OA\Get(
 *     path="/tools/{id}",
 *     tags={"tools"},
 *     summary="Get tool by ID",
 *     @OA\Parameter(
 *         name="id",
 *         in="path",
 *         required=true,
 *         description="ID of the tool",
 *         @OA\Schema(type="integer", example=1)
 *     ),
 *     @OA\Response(
 *         response=200,
 *         description="Returns the tool with the given ID"
 *     )
 * )
 */
Flight::route('GET /tools/@id', function($id){
    Flight::json(Flight::toolService()->get_tool_by_id($id));
});

/**
 * @OA\Post(
 *     path="/tools",
 *     tags={"tools"},
 *     summary="Add a new tool",
 *     @OA\RequestBody(
 *         required=true,
 *         @OA\JsonContent(
 *             required={"name", "category"},
 *             @OA\Property(property="name", type="string", example="Hammer"),
 *             @OA\Property(property="category", type="string", example="Hand Tools"),
 *             @OA\Property(property="description", type="string", example="A versatile hammer for various tasks"),
 *             @OA\Property(property="price", type="number", format="float", example=19.99)
 *         )
 *     ),
 *     @OA\Response(
 *         response=200,
 *         description="New tool created"
 *     )
 * )
 */
Flight::route('POST /tools', function(){
    $data = Flight::request()->data->getData();
    Flight::json(Flight::toolService()->add_tool($data));
});
?>