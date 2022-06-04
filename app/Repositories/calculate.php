<?php
namespace App\Repositories;
class Calculate{
    public function add($num1, $num2){
        return $num1 + $num2;
    }

    public function sub($num1, $num2){
        return $num2 - $num1;
    }

    public function mul($num1, $num2){
        return $num1 * $num2;
    }

    public function div($num1, $num2){
        return $num2 / $num1;
    }
}