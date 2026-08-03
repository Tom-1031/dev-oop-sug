<?php
require_once "../classes/User.php"; 

$user = new User;

# call the method
$user->login($_POST);
// print_r($_POST);
?>