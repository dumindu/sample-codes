<?php

require __DIR__ . '/../vendor/autoload.php';

$app = new \App\HelloWorld();
echo $app->greet();