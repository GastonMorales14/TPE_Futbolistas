<?php

class AuthHelper{

    function __construct(){
    }


    //si esta seteada la sesion con el email retorna verdadero y sino falso para chequear si el usuario esta logueado
    function checkLoggedIn(){
        session_start();
        if(isset($_SESSION["email"])){  
            return true;
        } else {
            return false;
        }
    }

    //trae el nombre del usuario logueado
    function getName() {
        if(isset($_SESSION['name'])) {
            $name = $_SESSION['name'];
            return $name;
        }

    }

}





