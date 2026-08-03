<?php
//this is coment
class Fare {
    private $age;
    private $distance;

    public function __construct($new_age, $new_distance)
    {
        $this->age      = $new_age;
        $this->distance = $new_distance;
    }

    public function showinfo() {
        echo "Age: {$this->age}" . "<br>";
        echo "Distance: {$this->distance}" . "<br>";
    }

    public function calculateDiscount() {
    
        if($this->distance <= 4) {
            $fare = 8;
        } else {
            $fare = 8 + $this->distance - 4;
        }

        if($this->age >= 60) {
            $fare = $fare * 0.8;
        }

        return $fare;
    }

    public function describeTotalPrice() {
        return $this->calculateDiscount();
    }

    public function setAge($new_age){
        $this->age = $new_age;
    }

    public function setDistance($new_distance){
        if($new_distance < 0) {
            echo "Distance cannot be negative.";
        }else {
            $this->distance = $new_distance;
        }
    }

    public function getAge(){
        return $this->age . " years old";
    }

    public function getDistance(){
        return $this->distance . " km";
    }
}
?>
