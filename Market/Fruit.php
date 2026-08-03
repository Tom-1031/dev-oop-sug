<?php

require_once "Market.php"; //import/connect

# Child Class
class Fruit extends Market{
    private $color;
    private $taste;

    public function __construct($store_name, $product_name, $price, $color, $taste)
    {
        $this->store_name    = $store_name;
        $this->product_name  = $product_name;
        $this->price         = $price;
        $this->color         = $color;
        $this->taste         = $taste;
    }

    public function announce(){
        return "Enjoy this {$this->color} and {$this->taste} {$this->product_name} for just \$ {$this->price}! <br><br>";
    }

    public function displayDetails(){
        return "<b>Price</b>: $" . $this->price . "<br>" .
               "<b>Color</b>: " . $this->color . "<br>" .
               "<b>Taste</b>: " . $this->taste . "<br>";
    }  
    
    // OVERIDING allows a child class to define a method that already exists in its parent class.
    public function openStore(){
        return "<b style='color:red; font-style:italic;'>$this->store_name</b> is now open! Selling fresh {$this->product_name}.<br>";
    }
}
?>