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

    function showHome(){
        $this->authHelper->checkLoggedIn();
        $role = $this->authHelper->getRole();
        $players = $this->model->getPlayers();
        $this->view->showPlayers($players,$role);

    }

    function createPlayer(){
        $this->model->insertPlayer( $_POST['nombre'],$_POST['apellido'],$_POST['equipo'],$_POST['posicion'],$_POST['fk_id_nacionalidad']);
        $this->view->showHomeLocation();
    }
  

    function deletePlayer($id) {
        $this->authHelper->checkLoggedIn();
        $this->model->deletePlayerFromDB($id);
        $this->view->showHomeLocation();
    }

    
  
            
    
}

