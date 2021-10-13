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


    function createPlayer($id){
        $logged = $this->authHelper->checkLoggedIn();
        if($logged == true){
            $this->model->insertPlayer( $_POST['nombre'],$_POST['apellido'],$_POST['numeroCamiseta'],$_POST['equipo'],$_POST['posicion'],$_POST['edad'],$id);
            $this->view->showHomeLocation($id);
        }
    }
  

    function deletePlayer($idSeleccion, $idJugador) {
        $logged = $this->authHelper->checkLoggedIn();
        if($logged == true){            
            $this->model->deletePlayerFromDB($idJugador);
            $this->view->showHomeLocation($idSeleccion);
        }
    }

    function viewPlayer($id){
        $logged = $this->authHelper->checkLoggedIn();
        $player = $this->model->getPlayerFromDB($id);
        $this->view->viewPlayer($player,$logged);
    }

    function modifyPlayer($id){
        $logged = $this->authHelper->checkLoggedIn();
        if($logged == true){
            $this->model->modifyPlayerFromDB($id, $_POST['nombre'], $_POST['apellido'],$_POST['numeroCamiseta'], $_POST['equipo'], $_POST['posicion'], $_POST['edad']);
            $player = $this->model->getPlayerFromDB($id);
            $this->view->viewPlayer($player, $logged);
        }    
    }

    
  
            
    
}

