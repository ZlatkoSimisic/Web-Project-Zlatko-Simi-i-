<?php
require_once 'dao/userDao.php';
require_once 'dao/bookingDao.php';


$userDao = new UserDao();
$bookingDao = new bookingDao();


// Insert a new user (Customer)
$userDao->insert([
   'name' => 'John Doe',
   'email' => 'john@example.com',
   'password' => password_hash('password123', PASSWORD_DEFAULT),
   'role' => 'Customer'
]);


// Insert a new order
$bookingDao->insert([
   'user_id' => 1,
]);


// Fetch all users
$users = $userDao->getAll();
print_r($users);


// Fetch all orders
$orders = $orderDao->getAll();
print_r($orders);


?>
