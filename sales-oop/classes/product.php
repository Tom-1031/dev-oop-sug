<?php
require_once "Database.php";

class Product {

    public function store($data) {
        $db   = new Database();
        $conn = $db->getConnection();

        $product_name = $conn->real_escape_string($data['product_name']);
        $price         = $conn->real_escape_string($data['price']);
        $quantity      = $conn->real_escape_string($data['quantity']);

        $sql = "INSERT INTO `Pro` (`product_name`, `price`, `quantity`)
                VALUES ('$product_name', '$price', '$quantity')";

        if($conn->query($sql)) {
            header("location: ../view/dashboard.php");
            exit;
        } else {
            die("Error adding product: " . $conn->error);
        }
    }

    public function getAll() {
        $db   = new Database();
        $conn = $db->getConnection();

        $sql = "SELECT * FROM `Pro` ORDER BY `id` DESC";

        $result = $conn->query($sql);

        if(!$result) {
            die("Error retrieving products: " . $conn->error);
        }

        return $result;
    }

    public function update($data) {
        $db   = new Database();
        $conn = $db->getConnection();

        $id            = (int)$data['id'];
        $product_name  = $conn->real_escape_string($data['product_name']);
        $price         = $conn->real_escape_string($data['price']);
        $quantity      = $conn->real_escape_string($data['quantity']);

        $sql = "UPDATE `Pro`
                SET `product_name` = '$product_name', `price` = '$price', `quantity` = '$quantity'
                WHERE `id` = $id";

        if($conn->query($sql)) {
            header("location: ../view/dashboard.php");
            exit;
        } else {
            die("Error updating product: " . $conn->error);
        }
    }

    public function delete($id) {
        $db   = new Database();
        $conn = $db->getConnection();

        $id = (int)$id;

        $sql = "DELETE FROM `Pro` WHERE `id` = $id";

        if($conn->query($sql)) {
            header("location: ../view/dashboard.php");
            exit;
        } else {
            die("Error deleting product: " . $conn->error);
        }
    }

    // Sells one unit of the product (decreases quantity by 1)
    public function pay($id) {
        $db   = new Database();
        $conn = $db->getConnection();

        $id = (int)$id;

        $sql = "UPDATE `Pro` SET `quantity` = `quantity` - 1 WHERE `id` = $id AND `quantity` > 0";

        if($conn->query($sql)) {
            header("location: ../view/dashboard.php");
            exit;
        } else {
            die("Error processing payment: " . $conn->error);
        }
    }
}
?>