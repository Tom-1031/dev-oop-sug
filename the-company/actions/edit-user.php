<?php
require_once "../classes/User.php"; //import User class

# Create an object
$user = new User;

# call the method
$user->update($_POST, $_FILES);
// print_r($_POST);
?>