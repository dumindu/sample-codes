<?php
namespace App\Configs;

class AppConfig {
    const TIMEZONE = 'EST';

    const ERROR_REPORTING = 'E_ALL';
    const DISPLAY_ERRORS = 1;

    const DB_CONFIGS = [
        'driver'    => 'mysql',
        'host'      => 'localhost',
        'database'  => 'php-skeleton',
        'username'  => 'php-skeleton',
        'password'  => 'php-skeleton',
        'charset'   => 'utf8',
        'collation' => 'utf8_unicode_ci'
    ];

    const STATIC_PATHS = [
        'viewDir' => __DIR__ . '/../../../resources/views'
    ];
}
