<?php
session_start();
$homedirectory = "http://narrit.qwede.de/tell/login/default";

//if login in session is not set
if (!isset($_SESSION['login'])) {
    header("Location: " . $homedirectory);
    $_SESSION["login"] = "defaultUser";
}
define('WEBROOT', str_replace("Webroot/index.php", "", $_SERVER["SCRIPT_NAME"]));
define('ROOT', str_replace("Webroot/index.php", "", $_SERVER["SCRIPT_FILENAME"]));

require(ROOT . 'Config/core.php');

require(ROOT . 'router.php');
require(ROOT . 'request.php');
require(ROOT . 'dispatcher.php');

$dispatch = new Dispatcher();
$dispatch->dispatch();
?>