<?php
session_start();

require_once './app/config/config_db.php';
require_once './app/config/config.php';
require_once './app/models/login.php';

if(!isset($_GET["controller"])) $_GET["controller"] = constant("DEFAULT_CONTROLLER");
if(!isset($_GET["action"])) $_GET["action"] = constant("DEFAULT_ACTION");

$controller_path = './controllers/'.$_GET["controller"].'.php';

if(!file_exists($controller_path)) $controller_path = 'app/controllers/'.constant("DEFAULT_CONTROLLER").'.php';


require_once $controller_path;

$controllerName = 'Controlador'.$_GET["controller"];
$controller = new $controllerName();


$dataToView["data"] = array();
if(method_exists($controller,$_GET["action"])) $dataToView["data"] = $controller->{$_GET["action"]}();


require_once './app/views/template/header.php';
require_once './app/views/'.$controller->view.'.php';
require_once './app/views/template/footer.php';
