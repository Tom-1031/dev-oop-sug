<?php
 require_once "Database.php"; //connect

 class User extends Database {
    //contains the logic of the app, CRUD

    #CREATE
    public function store($request) { //$reqest is equal to $_POST
        $first_name = $request['first_name'];//POST['first_name']
        $last_name  = $request['last_name'];
        $username   = $request['username'];
        $password   = $request['password'];

        $password   = password_hash($password, PASSWORD_DEFAULT);

        $sql = "INSERT INTO users (`first_name`, `last_name`, `username`, `password`) 
                VALUES ('$first_name', '$last_name', '$username', '$password')";

        if ($this->conn->query($sql)){
            header('location: ../views');
            exit;
        } else {
            die('Error creating the user: ' . $this->conn->error);
        }
    }

    # READ
    public function login($request){
        $username =$request['username'];
        $password =$request['password'];

        $sql = "SELECT * FROM users WHERE username = '$username'";
        $result = $this->conn->query($sql);
        //print_r($result);

        # 1. Check the username
        if ($result->num_rows == 1){
            # 2. Check the password
            $user = $result->fetch_assoc();
            // print_r($user);
            if (password_verify($password, $user['password'])){
                // Create session variable for future use
                session_start();
                $_SESSION['id'] = $user['id'];
                $_SESSION['username'] = $user['username'];
                $_SESSION['full_name'] = $user['first_name'] . " " . $user['last_name'];

                header('location: ../views/dashboard.php');
                exit;
            } else {
                die('password is incorrect');
            }
        } else {
            die('username not found');
        }

    }

    # LOGOUT
    public function logout(){
        session_start();
        session_unset();
        session_destroy();

        header('location: ../views');
        exit;
    }

    #read all
    public function getAllUsers(){
        $sql = "SELECT * FROM users";

        if ($result = $this->conn->query($sql)){
            return $result;
        } else {
            die('Error retrieving the users: ' . $this->conn->error);
        }
    }

    # read specific
    public function getUser($id){    
        $sql = "SELECT * FROM users WHERE id = $id";

        if ($result = $this->conn->query($sql)){
            return $result->fetch_assoc();
        } else {
            die('Error retrieving the user: ' . $this->conn->error);
        }
    }

    # UPDATE
    public function update($request, $files){
        session_start();
        $id         = $_SESSION['id'];             // id of the user
        $first_name = $request['first_name'];
        $last_name  = $request['last_name'];
        $username   = $request['username'];
        $photo      = $files['photo']['name'];     // name of the file
        $tmp_name   = $files['photo']['tmp_name']; // temporary location of the file

        $sql = "UPDATE users
                SET first_name = '$first_name',
                    last_name  = '$last_name',
                    username   = '$username'
                WHERE id = $id";
        
        if ($this->conn->query($sql)){
            $_SESSION['username']   = $username;
            $_SESSION['full_name']  = "$first_name  $last_name";

            if ($photo){
                $sql = "UPDATE users SET photo = '$photo' WHERE id = $id";
                $destination = "../assets/images/$photo";

                if ($this->conn->query($sql)){
                    if(move_uploaded_file($tmp_name, $destination)){
                        header('location: ../views/dashboard.php');
                        exit;
                    }else {
                        die('Error uploading photo');
                    }
                }else {
                    die('Error updating photo: ' . $this->conn->error);
                }
            }
            header('location: ../views/dashboard.php');
            exit;
        } else {
            die('Error updating the user: ' . $this->conn->error); 
        }
    }

    # DELETE
    public function delete(){
        session_start();
        $id = $_SESSION['id'];

        $sql = "DELETE FROM users WHERE id = $id";

        if ($this->conn->query($sql)){
             $this->logout();
        } else {
            die('Error deleting your user: ' . $this->conn->error);
        }
    }
}
?>