<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
require_once '../classes/User.php'; 

$user = new User();

$user->store($_POST); 
// print_r($_POST);
?>