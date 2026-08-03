<?php
require_once "Database.php";

class User {

    public function store($data) {
        $db   = new Database();
        $conn = $db->getConnection();

        $first_name = $conn->real_escape_string($data['first_name']);
        $last_name  = $conn->real_escape_string($data['last_name']);
        $username   = $conn->real_escape_string($data['username']);
        $password   = password_hash($data['password'], PASSWORD_DEFAULT);

        $sql = "INSERT INTO `Users` (`first_name`, `last_name`, `username`, `password`)
                VALUES ('$first_name', '$last_name', '$username', '$password')";

        if($conn->query($sql)) {
            header("location: ../view/index.php");
            exit;
        } else {
            die("Error registering account: " . $conn->error);
        }
    }

    public function login($data) {
        session_start();

        $db   = new Database();
        $conn = $db->getConnection();

        $username = $conn->real_escape_string($data['username']);

        $sql = "SELECT * FROM `Users` WHERE `username` = '$username'";
        $result = $conn->query($sql);

        if($result && $result->num_rows === 1) {
            $row = $result->fetch_assoc();

            if(password_verify($data['password'], $row['password'])) {
                $_SESSION['user_id']    = $row['id'];
                $_SESSION['username']   = $row['username'];
                $_SESSION['first_name'] = $row['first_name'];

                header("location: ../view/dashboard.php");
                exit;
            }
        }

        // Login failed
        header("location: ../view/index.php?error=1");
        exit;
    }
}
?>