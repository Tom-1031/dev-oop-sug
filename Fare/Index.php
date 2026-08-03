<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fare</title>
</head>
<body>
    <form action="" method="post">
        <label for="age">Age:</label>
        <input type="text" name="age" id="age">

        <br>

        <label for="distance">Distance:</label>
        <input type="number" name="distance" id="distance" step="any">

        <br> 
        
        <button type="submit" name="btn_submit">Compute</button>
    </form>

    <?php
        require_once "Fare.php";

        if(isset($_POST['btn_submit'])){
            $age = $_POST['age'];
            $distance = $_POST['distance'];
            //$fare = $_POST['fare'];

            // INSTANCE OF A CLASS
            $fare = new Fare($age, $distance);// using constructor

            echo "Age: " . $fare->getAge();
            echo "<br>";
            echo "Distance: " . $fare->getDistance();
            echo "<br>";
            echo "fare: " . $fare->describeTotalPrice();
        }
    ?>
</body>
</html>