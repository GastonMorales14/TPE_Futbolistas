<?php

class AuthHelper{

    function __construct(){
    }

    function checkLoggedIn(){
        session_start();
        if(isset($_SESSION["email"])){  
            return true;
        } else {
            return false;
        }
    }

    function getName() {
        if(isset($_SESSION['name'])) {
            $name = $_SESSION['name'];
            return $name;
        }

    }

}





