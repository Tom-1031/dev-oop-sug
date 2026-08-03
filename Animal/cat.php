<?php

require_once "Animal.php";

class Cat extends Animal{
    public function __construct($name, $breed)
    {
        parent::__construct($name, "Cat", $breed);
    }

    public function speak(){
        return "Meow!";
    }
}
?>