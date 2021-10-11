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
        $this->authHelper->checkLoggedIn();
        $this->model->insertPlayer( $_POST['nombre'],$_POST['apellido'],$_POST['equipo'],$_POST['posicion'],$_POST['fk_id_nacionalidad']);
        $this->view->showHomeLocation();
    }
  

    function deletePlayer($id) {
        $this->authHelper->checkLoggedIn();
        $this->model->deletePlayerFromDB($id);
        $this->view->showHomeLocation();
    }

    function viewPlayer($id){
        $this->authHelper->checkLoggedIn();
        $role = $this->authHelper->getRole();
        $player = $this->model->getPlayerFromDB($id);
        $this->view->viewPlayer($player,$role);
    }

    function modifyPlayer($id){
        $this->authHelper->checkLoggedIn();

        $this->model->modifyPlayerFromDB($id, $_POST['nombre'], $_POST['apellido'], $_POST['equipo'], $_POST['posicion'], $_POST['fk_id_nacionalidad']);
        $role = $this->authHelper->getRole();
        $player = $this->model->getPlayerFromDB($id);
        $this->view->viewPlayer($player, $role);
    }

    
  
            
    
}

