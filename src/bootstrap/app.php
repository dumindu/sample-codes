<?php
use App\Configs\AppConfig;

date_default_timezone_set(AppConfig::TIMEZONE);
error_reporting(AppConfig::ERROR_REPORTING);
ini_set('display_errors', AppConfig::DISPLAY_ERRORS);
