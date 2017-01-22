<?php
use App\Configs\AppConfig;
use Illuminate\Database\Capsule\Manager as Capsule;

date_default_timezone_set(AppConfig::TIMEZONE);
error_reporting(AppConfig::ERROR_REPORTING);
ini_set('display_errors', AppConfig::DISPLAY_ERRORS);


$dbConfigs = AppConfig::DB_CONFIGS;
$capsule = new Capsule;
$capsule->addConnection([
    'driver'    => $dbConfigs['driver'],
    'host'      => $dbConfigs['host'],
    'database'  => $dbConfigs['database'],
    'username'  => $dbConfigs['username'],
    'password'  => $dbConfigs['password'],
    'charset'   => $dbConfigs['charset'],
    'collation' => $dbConfigs['collation'],
]);
$capsule->setAsGlobal();
$capsule->bootEloquent();

try {
    $capsule->getConnection()->getPdo();
} catch(Exception $e) {
    echo "Error connecting to database";
}
