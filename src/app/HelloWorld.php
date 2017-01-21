<?php
namespace App;


class HelloWorld
{
    public $greeting = 'Hello, World!';

    public function greet()
    {
        return $this->greeting;
    }
}