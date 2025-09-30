<?php

namespace oop;

class Car
{
public $make;
public $model;
public $year;
public $color;
public $status;
public function __construct(){
//echo "New car created!";
$this->park();
}
public function print(){
    echo "This car is $this->color, and is $this->status.";
}
public function forward(){
    $this->status="moving forward";
}
public function park(){
    $this->status = "PARKED";

}
}

$maddiesCar = new Car();//new keyword instantiates an object
$maddiesCar->color = "Black";//-> is the . in C#
$maddiesCar->forward();

$lydiasCar = new Car();
$lydiasCar->color = "White";
$lydiasCar->park();


$westonsCar = new Car();
$westonsCar->color = "Blue";
$westonsCar->forward();

$momanddadscar = new car();
$momanddadscar->color = "Red";

$maddiesCar->print();
$lydiasCar->print();
$westonsCar->print();
$momanddadscar->print();