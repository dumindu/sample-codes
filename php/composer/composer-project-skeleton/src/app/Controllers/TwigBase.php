<?php
namespace App\Controllers;

use App\Configs\AppConfig;

abstract class TwigBase
{
    public $view;

    public function __construct()
    {
        $this->view = new \Twig_Environment(new \Twig_Loader_Filesystem(AppConfig::STATIC_PATHS['viewDir']), []);
    }
}
