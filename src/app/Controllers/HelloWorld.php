<?php
namespace App\Controllers;

class HelloWorld
{
    public $greeting = 'Hello, World!';

    public function greet()
    {
        return $this->greeting;
    }
}