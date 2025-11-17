<?php
/**
 * @OA\Get(
 *     path="/technicians",
 *     tags={"technicians"},
 *     summary="Get all technicians",
 *     @OA\Response(
 *         response=200,
 *         description="Array of all technicians in the database"
 *     )
 * )
 */
Flight::route('GET /technicians', function(){
    Flight::json(Flight::technicianService()->get_all_technicians());
});

/**
 * @OA\Get(
 *     path="/technicians/{id}",
 *     tags={"technicians"},
 *     summary="Get technician by ID",
 *     @OA\Parameter(
 *         name="id",
 *         in="path",
 *         required=true,
 *         description="ID of the technician",
 *         @OA\Schema(type="integer", example=1)
 *     ),
 *     @OA\Response(
 *         response=200,
 *         description="Returns the technician with the given ID"
 *     )
 * )
 */
Flight::route('GET /technicians/@id', function($id){
    Flight::json(Flight::technicianService()->get_technician_by_id($id));
});
?>