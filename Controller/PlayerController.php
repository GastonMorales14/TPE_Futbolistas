<?php
require_once "./Model/PlayerModel.php";
require_once "./View/PlayerView.php";

class PlayerController{
    
    private $model;
    private $view;

    function __construct() {

        $this->model = new PlayerModel();
        $this->view = new PlayerView();

    }

    function showHome(){
        $players = $this->model->getPlayers();
        $this->view->showPlayers($players);
    }
}

