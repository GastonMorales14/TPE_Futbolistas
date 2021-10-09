<?php

require_once './libs/smarty-3.1.39/libs/Smarty.class.php'; 

class PlayerView{
    
    private $smarty;

    function __construct() {
        $this->smarty = new Smarty();
    }

    function showPlayers($players){
        $this->smarty->assign('nombre', 'apellido','equipo', 'posicion');        
        $this->smarty->assign('players', $players);
        $this->smarty->display('templates/playerList.tpl');
    }

    function showHomeLocation(){
        header("Location: ".BASE_URL."home");
    }


}