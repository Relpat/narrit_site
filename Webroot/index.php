<?php
session_start();
$homedirectory = "http://narrit.qwede.de/story/read/1";

//if login in session is not set
if (!isset($_SESSION['login'])) {
    header("Location: " . $homedirectory);
    $_SESSION["login"] = "defaultUser";
}
define('WEBROOT', str_replace("Webroot/index.php", "", $_SERVER["SCRIPT_NAME"]));
define('ROOT', str_replace("Webroot/index.php", "", $_SERVER["SCRIPT_FILENAME"]));

// load core
require(ROOT . 'plugins/CaesarCore/Loader.php');
use Narrit\Plugins\CaesarCore\Loader\Loader;
$coreLoader = new Loader();



//require(ROOT . 'Config/core.php');

//require(ROOT . 'router.php');
//require(ROOT . 'request.php');
//require(ROOT . 'dispatcher.php');

//$dispatch = new Dispatcher();
//$dispatch->dispatch();
?>