<?php
require_once './libs/smarty-3.1.39/libs/Smarty.class.php';

class LoginView{

    private $smarty;

    function __construct() {
        $this->smarty = new Smarty();
    }

    function showLogin($error = ""){
        $this->smarty->assign('error', $error);      
        $this->smarty->display('Templates/login.tpl');
    }

    function showHome($role = true){
        $this->smarty->assign('role', $role); 
        $this->smarty->display('Templates/playerList.tpl');

        header("Location: ".BASE_URL."home");
    }

}