<?php

require_once "Animal.php";

class Bird extends Animal{
    public function __construct($name, $breed)
    {
        parent::__construct($name, "Bird", $breed);
    }

    public function speak(){
        return "Tweet!";
    }
}
?>