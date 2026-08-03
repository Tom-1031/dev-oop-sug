<?php

require_once "Animal.php";
require_once "Dog.php";
require_once "Cat.php";
require_once "Bird.php";

if(isset($_POST['submit'])) {
    $name     = $_POST['name'];
    $species  = $_POST['species'];
    $breed    = $_POST['breed'];

    if ($species === "dog") {
        $animal = new Dog($name, $breed);
    } elseif ($species === "cat") {
        $animal = new Cat($name, $breed);
    } elseif ($species === "bird") {
        $animal = new Bird($name, $breed);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Animal</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">

</head>
<body class="bg-light">
    <div class="container py-5" style="max-width: 800px;">

        <div class="card border-primary mb-4">
            <div class="card-body w-75 mx-auto">
                <h1 class="card-title text-center text-primary">Animal Kingdom</h1>

                <br>

                <form method="POST" action="">
                    <div class="mb-3">
                        <label for="name" class="form-label fw-bold">Name:</label>
                        <input type="text" name="name" id="name" class="form-control" required>
                    </div>
            
                    <div class="row mb-3">
                       <div class="col">
                            <label for="species" class="form-label fw-bold">Species:</label>
                            <select name="species" id="species" class="form-select" required>
                                <option value="">Select Species</option>
                                <option value="dog">Dog</option>
                                <option value="cat">Cat</option>
                                <option value="bird">Bird</option>
                            </select>
                        </div>

                        <div class="col">
                           <label for="breed" class="form-label fw-bold">Breed:</label>
                           <input type="text" name="breed" id="breed" class="form-control" required>
                         </div>
                    </div>

                    <button type="submit" name="submit" class="btn btn-primary w-75">Submit</button>
                </form>
            </div>
        </div>

        <?php if (isset($animal)): ?>
            <div class="card border-danger">
                <div class="card-body">
                    <h2 class="text-danger"><?php echo $animal->getName(); ?></h2>
                    <p><?php echo $animal->introduce(); ?></p>
                    <p class="text-danger fw-bold fst-italic">
                        <?php echo $animal->getName(); ?> says: "<?php echo $animal->speak(); ?>"
                    </p>
                </div>
            </div>
        <?php endif; ?>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
    
</body>
</html>