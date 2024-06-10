<?php
// Autoloader + configuration
require_once("./config/autoload.php");
require_once("./config/siteConfig.php");
require_once("./config/DBConfig.php");

// Default controller
define("DEFAULT_CONTROLLER", "News");

// Default route
define("DEFAULT_ROUTE", DEFAULT_CONTROLLER."::list");

// Start session
session_start();

// Get current mode and action
$mode = DEFAULT_CONTROLLER;
if((isset($_GET['mode'])) && ($_GET['mode'] != ""))
    $mode = $_GET['mode'];

// Check current action
$action = "";
if((isset($_GET['action'])) && ($_GET['action'] != ""))
    $action = $_GET['action'];

// Route to a dedicated controller
if(!file_exists("./controller/{$mode}Controller.php"))
    $mode = DEFAULT_CONTROLLER;
$className = ucfirst($mode)."Controller";

// Route to a dedicated method
if(method_exists($className, $action))
    $methodName = $className."::".$action;
else {
    if(method_exists($className, 'index'))
        $methodName = $className."::index";
    else
        $methodName = DEFAULT_ROUTE;
}
$methodName();