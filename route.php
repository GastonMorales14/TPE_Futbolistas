<?php


require_once "Controller/PlayerController.php";
 


define('BASE_URL', '//'.$_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']).'/');


// lee la acción
if (!empty($_GET['action'])) {
    $action = $_GET['action'];
} else {
    $action = 'home'; // acción por defecto si no envían
}

$params = explode('/', $action);

$playerController = new PlayerController();

switch ($params[0]) {  
        case 'home': 
            $playerController->showHome(); 
            break;
        case 'createTask': 
            $taskController->createTask(); 
            break;
        case 'deleteTask': 
            $taskController->deleteTask($params[1]); 
            break;
        case 'updateTask': 
            $taskController->updateTask($params[1]); 
            break;
        case 'viewTask': 
            $taskController->viewTask($params[1]); 
            break;
        default: 
            echo('404 Page not found'); 
            break;
    
    
}

 


?>