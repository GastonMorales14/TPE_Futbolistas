<?php

require_once './libs/smarty-3.1.39/libs/Smarty.class.php'; 

class PlayerView{
    
    private $smarty;

    function __construct() {
        $this->smarty = new Smarty();
    }

    function showHomeLocation($id){
        header("Location: ".BASE_URL."nation/".$id);
    }

    function viewPlayer($player, $rol){
        $this->smarty->assign('player', $player);
        $this->smarty->assign('rol', $rol);
        $this->smarty->display('templates/playerDetail.tpl');
    }

}