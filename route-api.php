<?php

require_once 'libs/Router.php';

// crea el router
$router = new Router();

// define la tabla de ruteo
$router->addRoute('tareas', 'GET', 'ApiTaskController', 'obtenerTareas');
$router->addRoute('tareas', 'POST', 'ApiTaskController', 'crearTarea');
$router->addRoute('tareas/:ID', 'GET', 'ApiTaskController', 'obtenerTarea');

// rutea
$router->route($_GET["resource"], $_SERVER['REQUEST_METHOD']);
