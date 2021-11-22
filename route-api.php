<?php

require_once "libs/Route.php";
require_once "Controller/ApiCommentController.php";

// crea el router
$router = new Router();

// define la tabla de ruteo
$router->addRoute('comentarios', 'GET', 'ApiCommentController', 'getComments');
$router->addRoute('comentarios', 'POST', 'ApiCommentController', 'addComment');
$router->addRoute('comentarios/:ID', 'DELETE', 'ApiCommentController', 'getComentario');

// rutea
$router->route($_GET["resource"], $_SERVER['REQUEST_METHOD']);
