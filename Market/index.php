<?php

require_once "Fruit.php"; //import/connect
require_once "Meat.php";

# Create an object
$this_store = new Fruit("Tina's Mangoes", "mango", 3.25, "yellow", "sweet");
$albert_store = new Meat("Albert's Meatshop", "Ribeye Steak", 10, "beef", "ribs");

/*
   POLYMORPHISM means "many forms"
    - when different objects use the same method name - but each gives different result, depending on its class.
*/

echo $this_store->openStore();         //Override Fruit class
echo $this_store->announce();          //Fruit class
echo $this_store->displayDetails();    //Fruit class

echo "<hr>";

echo $albert_store->openStore();       //Market class
echo $albert_store->announce();        //Meat class
echo $albert_store->displayDetails();  //Meat class

?>