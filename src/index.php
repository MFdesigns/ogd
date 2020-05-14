<?php

/*
  Copyright (c) 2020 Michel Fäh, Dario Romandini
*/

define("DEBUG", true);
define("ROOT", __DIR__);
define("HOST_ROOT", "http://" . $_SERVER["SERVER_NAME"]);

require_once(ROOT . "/router.php");

if (!DEBUG) {
  error_reporting(0);
}

$url = parse_url($_SERVER["REQUEST_URI"], PHP_URL_PATH);
$router = new Router($url);
$router->route();

?>
