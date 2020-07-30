<?php

// Init
$config = require 'config.php';
require "model/Database.php";
require "controller/HomeController.php";

$GLOBALS['base_url'] = "http://localhost/php/";
$dsn = "mysql:host=".$config['db_host'].";dbname=".$config['db_name'].";charset=".$config['db_charset'];
$pdo = new PDO($dsn, $config['db_user'], $config['db_password'], $config['db_options']);
$db = new Database($pdo);

$controller = new HomeController($db);
$controller->index();