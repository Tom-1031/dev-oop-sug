<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="" method="post">
        <label for="name">Name:</label>
        <input type="text" name="name" id="name">

        <br>

        <label for="price">Price:</label>
        <input type="number" name="price" id="price" step="any">

        <br>
        
        <button type="submit" name="btn_submit">Submit</button>
    </form>

    <?php
        require_once "Fruit.php";

        if(isset($_POST['btn_submit'])){
            $name = $_POST['name'];
            $price = $_POST['price'];

            // INSTANCE OF A CLASS
            $fruit = new Fruit($name, $price);// using constructor

            // Set VALUES
            // SIngle Setters
            // $fruit->setName($name);
            // $fruit->setPrice($price);

            // Multiple Setter
            // $fruit->setValues($name, $price);
            
            // GET AND DISPLAY VALUES
            echo "Name: " . $fruit->getName();
            echo "<br>";
            echo "Price: " . $fruit->getPrice();
        }
    ?>
</body>
</html>