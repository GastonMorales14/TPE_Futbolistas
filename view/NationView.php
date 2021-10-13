<?php

require_once './libs/smarty-3.1.39/libs/Smarty.class.php'; 

class NationView{
    
    private $smarty;

    function __construct() {
        $this->smarty = new Smarty();
    }

    function showHome($nations, $logged, $name){
        $this->smarty->assign('nations', $nations);
        $this->smarty->assign('logged', $logged);
        $this->smarty->assign('name', $name);
        $this->smarty->display('templates/home.tpl');
    }

    function showNation($players, $logged, $id){
                
        $this->smarty->assign('players', $players);        
        $this->smarty->assign('logged', $logged);
        $this->smarty->assign('id', $id);

        $this->smarty->display('templates/playerList.tpl');
    }

    function showHomeLocation(){
        header("Location: ".BASE_URL."home");
    }
}

