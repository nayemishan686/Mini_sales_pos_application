<?php
namespace App\Repositories;
use Illuminate\Support\Facades\Facade;

class TestMath extends Facade{
    protected static function getFacadeAccessor(){
        return 'calculate';
    }
}