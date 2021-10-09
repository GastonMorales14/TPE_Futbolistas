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

        $players = $this->model->getPlayers();
        $this->view->showPlayers($players);

    }

    function createPlayer(){
        $this->model->insertPlayer( $_POST['nombre'],$_POST['apellido'],$_POST['equipo'],$_POST['posicion'],$_POST['fk_id_nacionalidad']);
        $this->view->showHomeLocation();
    }
  
  
            
    
}

