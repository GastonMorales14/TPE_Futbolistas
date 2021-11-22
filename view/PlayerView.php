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

    function viewPlayer($player, $role, $id){
        $this->smarty->assign('player', $player);
        $this->smarty->assign('role', $role);
        $this->smarty->assign('id', $id);
        $this->smarty->display('templates/playerDetail.tpl');
    }

    function showLogin($error = ""){
        $this->smarty->assign('error', $error);      
        $this->smarty->display('Templates/login.tpl');
    }

}