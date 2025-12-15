<?php
require 'vendor/autoload.php';
require 'services/AuthService.php';
require 'services/userService.php';
require "middleware/AuthMiddleware.php";


use Firebase\JWT\JWT;
use Firebase\JWT\Key;


ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Register services
Flight::register('userService', 'UserService');
Flight::register('toolService', 'ToolService');
Flight::register('servicesService', 'ServicesService');
Flight::register('technicianService', 'TechnicianService');
Flight::register('bookingService', 'BookingService');
Flight::register('auth_middleware', "AuthMiddleware");


// This wildcard route intercepts all requests and applies authentication checks before proceeding.
Flight::route('/*', function() {
   if(
       strpos(Flight::request()->url, '/auth/login') === 0 ||
       strpos(Flight::request()->url, '/auth/register') === 0
   ) {
       return TRUE;
   } else {
       try {
           $token = Flight::request()->getHeader("Authentication");
           if(Flight::auth_middleware()->verifyToken($token))
               return TRUE;
       } catch (\Exception $e) {
           Flight::halt(401, $e->getMessage());
       }
   }
});



require_once __DIR__ .'routes/AuthRoutes.php';
require_once __DIR__ . 'routes/user-routes.php';


Flight::start();


