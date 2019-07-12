<?php

function controllers_autoload($classname)
{
	include 'controllers/' . $classname . '.php';
}

spl_autoload_register('controllers_autoload');

function show_error()
{
	$error = new ErrorController();
	$error->index();
}

function load_controller()
{
	if (isset($_GET['controller'])) {
		$nombre_controlador = $_GET['controller'] . 'Controller';
	} elseif (!isset($_GET['controller']) && !isset($_GET['action'])) {
		$nombre_controlador = controller_default;
	} else {
		show_error();
		exit();
	}

	if (class_exists($nombre_controlador)) {
		$controlador = new $nombre_controlador();

		if (isset($_GET['action']) && method_exists($controlador, $_GET['action'])) {
			$action = $_GET['action'];
			$controlador->$action();
		} elseif (!isset($_GET['controller']) && !isset($_GET['action'])) {
			$action_default = action_default;
			$controlador->$action_default();
		} else {
			show_error();
		}
	} else {
		show_error();
	}
}

function call_action_controller($controller, $action)
{
	$controller = new $controller();
	$controller->$action();
}
