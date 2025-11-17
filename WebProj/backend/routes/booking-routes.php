<?php
/**
 * @OA\Get(
 *     path="/bookings",
 *     tags={"bookings"},
 *     summary="Get all bookings",
 *     @OA\Response(
 *         response=200,
 *         description="Array of all bookings in the database"
 *     )
 * )
 */
Flight::route('GET /bookings', function(){
    Flight::json(Flight::bookingService()->get_all_bookings());
});

/**
 * @OA\Get(
 *     path="/bookings/{id}",
 *     tags={"bookings"},
 *     summary="Get booking by ID",
 *     @OA\Parameter(
 *         name="id",
 *         in="path",
 *         required=true,
 *         description="ID of the booking",
 *         @OA\Schema(type="integer", example=1)
 *     ),
 *     @OA\Response(
 *         response=200,
 *         description="Returns the booking with the given ID"
 *     )
 * )
 */
Flight::route('GET /bookings/@id', function($id){
    Flight::json(Flight::bookingService()->get_booking_by_id($id));
});

/**
 * @OA\Post(
 *     path="/bookings",
 *     tags={"bookings"},
 *     summary="Create a new booking",
 *     @OA\RequestBody(
 *         required=true,
 *         @OA\JsonContent(
 *             required={"user_id", "service_id", "booking_date"},
 *             @OA\Property(property="user_id", type="integer", example=1),
 *             @OA\Property(property="service_id", type="integer", example=1),
 *             @OA\Property(property="technician_id", type="integer", example=1),
 *             @OA\Property(property="tool_id", type="integer", example=1),
 *             @OA\Property(property="booking_date", type="string", format="date-time", example="2024-01-15 10:00:00"),
 *             @OA\Property(property="notes", type="string", example="Additional notes about the booking")
 *         )
 *     ),
 *     @OA\Response(
 *         response=200,
 *         description="New booking created"
 *     )
 * )
 */
Flight::route('POST /bookings', function(){
    $data = Flight::request()->data->getData();
    Flight::json(Flight::bookingService()->add_booking($data));
});
?>