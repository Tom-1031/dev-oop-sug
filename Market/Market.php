<?php

/*
   INHERITANCE
      - a class can use a code from another class.
      - child class can inherit the properties and methods of a parent class.
         No need to declare them again in the child class.
      - each class could contain unique properties and methods.
*/

# Parents Class
class Market{
    protected $store_name;
    protected $product_name;
    protected $price;

    public function openStore(){
        return "<b>($this->store_name)</b> is now open! Selling fresh {$this->product_name}.<br>";
    }
}

?>