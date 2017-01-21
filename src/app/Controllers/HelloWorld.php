<?php
namespace App\Controllers;

class HelloWorld extends TwigBase
{
    public $greeting = 'Hello, World!';

    public function greet()
    {
        $data = [
            'pageMeta' => [
                'title' => $this->greeting
            ],
            'greeting' => $this->greeting
        ];

        echo $this->view->render('hello-world.html', $data);
    }
}