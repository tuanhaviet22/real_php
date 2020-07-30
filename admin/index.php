<?php

// Init
$config = require '../config.php';
require "../model/Database.php";
require "../controller/AdminController.php";

$dsn = "mysql:host=".$config['db_host'].";dbname=".$config['db_name'].";charset=".$config['db_charset'];
$pdo = new PDO($dsn, $config['db_user'], $config['db_password'], $config['db_options']);
$db = new Database($pdo);

$controller = new AdminController($db);
$controller->index();

function home_base_url(){


    $base_url = (isset($_SERVER['HTTPS']) &&

        $_SERVER['HTTPS']!='off') ? 'https://' : 'http://';



    $tmpURL = dirname(__FILE__);



    $tmpURL = str_replace(chr(92),'/',$tmpURL);

    $tmpURL = str_replace($_SERVER['DOCUMENT_ROOT'],'',$tmpURL);


    $tmpURL = ltrim($tmpURL,'/');

    $tmpURL = rtrim($tmpURL, '/');




    if (strpos($tmpURL,'/')){


        $tmpURL = explode('/',$tmpURL);

        $tmpURL = $tmpURL[0];

    }



    if ($tmpURL !== $_SERVER['HTTP_HOST'])



        $base_url .= $_SERVER['HTTP_HOST'].'/'.$tmpURL.'/';

    else



        $base_url .= $tmpURL.'/';



    return $base_url;

}



