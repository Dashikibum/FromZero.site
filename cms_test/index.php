<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include 'config.php';
include 'libs/route.php';

$route = getRoute();

include "controller/$route.php";

echo renderPage($config);

?>