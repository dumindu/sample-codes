<?php
namespace App\Controllers;

use App\Configs\AppConfig;

class HelloWorld extends TwigBase
{
    public $greeting = 'Hello, World!';

    public function greet()
    {
        $data = [
            'pageMeta' => [
                'title' => $this->greeting
            ],
            'greeting' => $this->greeting,
            'projectUrl' => AppConfig::PROJECT_URL
        ];

        echo $this->view->render('hello-world.html', $data);
    }
}