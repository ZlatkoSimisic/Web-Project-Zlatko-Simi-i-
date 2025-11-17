<?php
require_once 'vendor/autoload.php';
require_once 'config.php';

// Register services
Flight::register('userService', 'UserService');
Flight::register('toolService', 'ToolService');
Flight::register('servicesService', 'ServicesService');
Flight::register('technicianService', 'TechnicianService');
Flight::register('bookingService', 'BookingService');

// Include all route files
foreach (glob("routes/*.php") as $filename) {
    require_once $filename;
}

Flight::start();
?>