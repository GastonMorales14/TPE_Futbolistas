<?php

require_once "./Model/LoginModel.php";
require_once "./View/LoginView.php";

class LoginController {

    private $model;
    private $view;

    function __construct(){
        $this->model = new UserModel();
        $this->view = new LoginView();
    }
    function logout(){
        session_start();
        session_destroy();
        $this->view->showHome();
    }

    function login(){
        $this->view->showLogin();
    }

    function verifyLogin(){
        if (!empty($_POST['email']) && !empty($_POST['password'])) {
            $email = $_POST['email'];
            $password = $_POST['password'];
            
           
     
            // Obtengo el usuario de la base de datos
            $user = $this->model->getUser($email);
            $name = $user->name;
     
            // Si el usuario existe y las contraseñas coinciden
            if ($user && password_verify($password, $user->password)) {

                session_start();
                $_SESSION['email'] = $email;
                $_SESSION['name'] = $name;
                

                
                $this->view->showHome();
            } else {
                $this->view->showLogin("Acceso denegado");
            }
        }
    }
}