<?php
/**
 * @OA\Get(
 *     path="/services",
 *     tags={"services"},
 *     summary="Get all services",
 *     @OA\Response(
 *         response=200,
 *         description="Array of all services in the database"
 *     )
 * )
 */
Flight::route('GET /services', function(){
    Flight::json(Flight::servicesService()->get_all_services());
});

/**
 * @OA\Get(
 *     path="/services/{id}",
 *     tags={"services"},
 *     summary="Get service by ID",
 *     @OA\Parameter(
 *         name="id",
 *         in="path",
 *         required=true,
 *         description="ID of the service",
 *         @OA\Schema(type="integer", example=1)
 *     ),
 *     @OA\Response(
 *         response=200,
 *         description="Returns the service with the given ID"
 *     )
 * )
 */
Flight::route('GET /services/@id', function($id){
    Flight::json(Flight::servicesService()->get_service_by_id($id));
});

/*
 * @OA\Post(
 *     path="/services",
 *     tags={"services"},
 *     summary="Add a new service",
 *     @OA\RequestBody(
 *         required=true,
 *         @OA\JsonContent(
 *             required={"name", "price"},
 *             @OA\Property(property="name", type="string", example="Tool Repair"),
 *             @OA\Property(property="description", type="string", example="Professional tool repair service"),
 *             @OA\Property(property="price", type="number", format="float", example=49.99)
 *         )
 *     ),
 *     @OA\Response(
 *         response=200,
 *         description="New service created"
 *     )
 * )
 */
Flight::route('POST /services', function(){
    $data = Flight::request()->data->getData();
    Flight::json(Flight::servicesService()->add_service($data));
});
?>