<?php

require_once "Market.php"; //import/connect

# Child Class
class Meat extends Market{
    private $animal_type;
    private $cut;

    public function __construct($store_name, $product_name, $price, $animal_type, $cut)
    {
        $this->store_name    = $store_name;
        $this->product_name  = $product_name;
        $this->price         = $price;
        $this->animal_type   = $animal_type;
        $this->cut           = $cut;
    }

    public function announce(){
        return "Enjoy this {$this->animal_type} {$this->cut} {$this->product_name} for just \$ {$this->price}! <br><br>";
    }

    public function displayDetails(){
        return "<b>Price</b>: $" . $this->price . "<br>" .
               "<b>Animal Type</b>: " . $this->animal_type . "<br>" .
               "<b>Cut</b>: " . $this->cut . "<br>";
    }
}
?>