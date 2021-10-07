<?php

require_once './libs/smarty-3.1.39/libs/Smarty.class.php';

class RegisterView{
    
    private $smarty;

    function __construct() {
        $this->smarty = new Smarty();
        
    }

    function showRegister($error = ""){
        $this->smarty->assign('titulo', 'Log In');
        $this->smarty->assign('error', $error);    
        $this->smarty->display('Templates/register.tpl');
    }

    function showHomeLocation(){
        header("Location: ".BASE_URL."login");
    }
}
    