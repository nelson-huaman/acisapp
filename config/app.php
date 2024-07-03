<?php

use Dotenv\Dotenv;
use Model\ActiveRecord;

require_once __DIR__ . '/../vendor/autoload.php';

$dotenv = Dotenv::createImmutable(__DIR__);
$dotenv->safeLoad();

require 'funciones.php';
require 'database.php';

ActiveRecord::setDB($db);