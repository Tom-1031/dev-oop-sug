<?php
class Animal{
    protected $name;
    protected $species;
    protected $breed;

    public function __construct($name, $species, $breed){
        $this->name    = $name;
        $this->species = $species;
        $this->breed   = $breed;
    }

    public function introduce(){
        return "Hello there! My name is {$this->name}. I am a <b>{$this->species}</b> and my breed is <b>{$this->breed}</b>.<br>";
    }

    public function getName(){
        return $this->name;
    }

    public function getSpecies(){
        return $this->species;
    }

    public function getBreed(){
        return $this->breed;
    }
}
?>