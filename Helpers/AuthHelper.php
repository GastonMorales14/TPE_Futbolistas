<?php

class AuthHelper{

    function __construct(){
    }

    function checkLoggedIn(){
        session_start();
        if(!isset($_SESSION["email"])){  
            header("Location: ".BASE_URL."login");
        }
    }

    function getRole() {
        if(isset($_SESSION['role'])) {
            $role = $_SESSION['role'];
            return $role;
        }

    }

}





