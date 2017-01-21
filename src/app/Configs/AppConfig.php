<?php
namespace App\Configs;

class AppConfig {
    const TIMEZONE = 'EST';

    const ERROR_REPORTING = 'E_ALL';
    const DISPLAY_ERRORS = 1;

    const STATIC_PATHS = [
        'viewDir' => __DIR__ . '/../../../resources/views'
    ];
}
