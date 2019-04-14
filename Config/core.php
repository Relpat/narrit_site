<?php

// core requirements
require(ROOT . "Config/Debugger/Debugger.php");
require(ROOT . "Config/db.php");
require(ROOT . "Config/NarritCore.php");
require(ROOT . "Config/CoreFunctions.php");
require(ROOT . "Config/Settings/Settings.php");

// MVC Settings with repository
require(ROOT . "Core/DefaultRepository.php");
require(ROOT . "Core/DefaultModel.php");
require(ROOT . "Core/DefaultController.php");

?>