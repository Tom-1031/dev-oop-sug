<?php

require_once "Animal.php";

class Dog extends Animal{
    public function __construct($name, $breed)
    {
        parent::__construct($name, "Dog", $breed);
    }

    public function speak(){
        return "Woof!";
    }
}
?>