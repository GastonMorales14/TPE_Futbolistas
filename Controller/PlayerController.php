<?php
require_once "./Model/PlayerModel.php";
require_once "./View/PlayerView.php";
require_once "./Helpers/AuthHelper.php";

class PlayerController{
    
    private $model;
    private $view;
    private $authHelper;

    function __construct() {

        $this->model = new PlayerModel();
        $this->view = new PlayerView();
        $this->authHelper = new AuthHelper();

    }

    //crea un nuevo jugador
    function createPlayer($id){
        $logged = $this->authHelper->checkLoggedIn();
        if($logged == true){
            $role = $this->authHelper->getRole();
            if($role == 1){
                $this->model->insertPlayer( $_POST['nombre'],$_POST['apellido'],$_POST['numeroCamiseta'],$_POST['equipo'],$_POST['posicion'],$_POST['edad'],$id);
                $this->view->showHomeLocation($id);
            }else{
                echo("Pagina no disponible");
            }
        }else{
            $this->view->showLogin();
        }    
    }
  
    //elimina un jugador elegido de la seleccion
    function deletePlayer($idSeleccion, $idJugador) {
        $logged = $this->authHelper->checkLoggedIn();
        if($logged == true){
            $role = $this->authHelper->getRole();
            if($role == 1){            
                $this->model->deletePlayerFromDB($idJugador);
                $this->view->showHomeLocation($idSeleccion);
            }else{
                echo("Pagina no disponible");
            }
        }else{
            $this->view->showLogin();
        }    
    }
    
    //muestra el detalle de un jugador en pantalla
    function viewPlayer($id){
        $logged = $this->authHelper->checkLoggedIn();
        if($logged == true){
            $email = $this->authHelper->getEmail();
            $role = $this->authHelper->getRole();
            $player = $this->model->getPlayerFromDB($id);
            $this->view->viewPlayer($player, $email, $role, $id);
        }else{
            $this->view->showLogin();
        }
    }

    //modifica un jugador seleccionado
    function modifyPlayer($id){
        $logged = $this->authHelper->checkLoggedIn();
        if($logged == true){
            $role = $this->authHelper->getRole();
            if($role == 1){
                $this->model->modifyPlayerFromDB($id, $_POST['nombre'], $_POST['apellido'],$_POST['numeroCamiseta'], $_POST['equipo'], $_POST['posicion'], $_POST['edad']);
                $player = $this->model->getPlayerFromDB($id);
                $this->view->viewPlayer($player, $role);
            }else{
                echo("Pagina no disponible");
            } 
        }else{
            $this->view->showLogin();
        }       
    }

    
  
            
    
}

