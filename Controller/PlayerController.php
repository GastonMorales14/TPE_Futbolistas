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
        $role = $this->authHelper->getRole();
        if($role == false){
            $this->model->insertPlayer( $_POST['nombre'],$_POST['apellido'],$_POST['numeroCamiseta'],$_POST['equipo'],$_POST['posicion'],$_POST['edad'],$id);
            $this->view->showHomeLocation($id);
        }
    }
  
    //elimina un jugador elegido de la seleccion
    function deletePlayer($idSeleccion, $idJugador) {
        $role = $this->authHelper->getRole();
        if($role == false){            
            $this->model->deletePlayerFromDB($idJugador);
            $this->view->showHomeLocation($idSeleccion);
        }
    }
    //muestra el detalle de un jugador en pantalla
    function viewPlayer($id){
        $logged = $this->authHelper->checkLoggedIn();
        if($logged == true){
            $role = $this->authHelper->getRole();
            $player = $this->model->getPlayerFromDB($id);
            $this->view->viewPlayer($player, $role);
        }
    }
    //modifica un jugador seleccionado
    function modifyPlayer($id){
        $role = $this->authHelper->getRole();
        if($role == false){
            $this->model->modifyPlayerFromDB($id, $_POST['nombre'], $_POST['apellido'],$_POST['numeroCamiseta'], $_POST['equipo'], $_POST['posicion'], $_POST['edad']);
            $player = $this->model->getPlayerFromDB($id);
            $this->view->viewPlayer($player, $role);
        }    
    }

    
  
            
    
}

