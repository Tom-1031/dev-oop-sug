<?php

/*
   INHERITANCE
      - a class can use a code from another class.
      - child class can inherit the properties and methods of a parent class.
         No need to declare them again in the child class.
      - each class could contain unique properties and methods.
*/

class Fruit {
    // Access Modifiers (public, private) - are keywords that control who can access or use a property or method in your code.
    
    # Properties (variables)
    private $name;
    private $price;

    # Methods (functions)

    // CONSTRUCTOR is a special method that automatically runs when an object is created.
    public function __construct($new_name, $new_price) 
    {
        $this->name  = $new_name;
        $this->price = $new_price;
    }

    public function showinfo() {
        echo "Name: {$this->name}" . "<br>";
        echo "Price: {$this->price}" . "<br>";
    }

    public function calculateVAT() {
        return $this->price * 1.12;
    }

    public function describeTotalPrice() {
        return "The {$this->name} costs {$this->calculateVAT()}";
    }

    # SETTERS and GETTERS controls how class properties are accessed and changed.

    # Setters define the value of a property.

    // Single Setters
    public function setName($new_name){
        $this->name = $new_name;
    }

    public function setPrice($new_price){
        if($new_price < 0) {
            echo "Price cannot be negative.";
        }else {
            $this->price = $new_price;
        }
    }

    // Multiple Setters 
    public function setValues($new_name, $new_price){
        $this->name  = $new_name;
        $this->price = $new_price;
    }

    # Getters return/get the value of a property.
    public function getName(){
        return $this->name;
    }

    public function getPrice(){
        return $this->price;
    }
}

# Create an object
// object is an instance (a new copy) of a class.
// $apple = new Fruit; // apple object is a new copy of Fruit class.
// $banana = new Fruit;

// // Access public methods
// $apple->setName("Apple");
// $apple->setPrice(3.25);
// $apple->showinfo();

// // Access private properties
// // error;
// // $apple->name;
// // $apple->price;

// // Use getters
// echo "<br>";
// echo $apple->getName();
// echo "<br>";
// echo $apple->getPrice();

// echo "<br><br>";

// $banana->setName("Banana");
// $banana->setPrice(1.20);
// $banana->showinfo();
// ?>