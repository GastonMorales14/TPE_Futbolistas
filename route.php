<?php


require_once "Controller/PlayerController.php";
require_once "Controller/LoginController.php";
require_once "Controller/RegisterController.php";
require_once "Controller/NationController.php";
 


define('BASE_URL', '//'.$_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']).'/');
//base url 


// lee la acción
if (!empty($_GET['action'])) {
    $action = $_GET['action'];
} else {
    $action = 'home'; // acción por defecto si no envían
}

$params = explode('/', $action);

$playerController = new PlayerController();
$loginController = new LoginController();
$registerController = new RegisterController();
$nationController = new NationController();



switch ($params[0]) { 
        case 'login': 
            $loginController->login(); 
            break;
        case 'logout': 
            $loginController->logout(); 
            break;
        case 'verify': 
            $loginController->verifyLogin(); 
            break;
        case 'home': 
            $nationController->showHome(); 
            break;
        case 'register': 
            $registerController->register(); 
            break;
        case 'createUser':
            $registerController->createUser();
            break;
        case 'createPlayer':
            $playerController->createPlayer($params[1]);
            break;
        case 'deletePlayer':
            $playerController->deletePlayer($params[1], $params[2]);
            break;
        case 'modifyPlayer':
            $playerController->modifyPlayer($params[1]);
            break;
        case 'viewPlayer':
            $playerController->viewPlayer($params[1]);
            break;
        case 'nation': 
            $nationController->showNation($params[1]); 
            break;
        case 'createNation': 
            $nationController->createNation(); 
            break;
        case 'deleteNation': 
            $nationController->deleteNation($params[1]); 
            break;         
        case 'modifyNation': 
            $nationController->modifyNation($params[1]); 
            break; 
            
        default: 
            echo('404 Page not found'); 
            break;
    
    
}

 


?>