<?php

require_once "./Model/UserModel.php";
require_once "./View/LoginView.php";

class LoginController {

    private $model;
    private $view;

    function __construct(){
        $this->model = new UserModel();
        $this->view = new LoginView();
    }

    /* destruye la sesion y muestra el home */
    function logout(){
        session_start();
        session_destroy();
        $this->view->showLogin();
    }

    /* muestra el login */
    function login(){
        $this->view->showLogin();
    }

    /* verifica el mail y la contraseña  */
    function verifyLogin(){
        if (!empty($_POST['email']) && !empty($_POST['password'])) {
            $email = $_POST['email'];
            $password = $_POST['password'];
            
           
     
            // Obtengo el usuario de la base de datos y guarda su nombre en una variable
            $user = $this->model->getUser($email);
            $name = $user->name;
            $role = $user->admin;
     
            // Si el usuario existe y las contraseñas coinciden
            if ($user && password_verify($password, $user->password)) {

                // guarda el email y el nombre en la sesion
                session_start();
                $_SESSION['email'] = $email;
                $_SESSION['name'] = $name;
                $_SESSION['role'] = $role;               

                
                $this->view->showHome();
            } else {
                $this->view->showLogin("Acceso denegado"); //si no coinciden o no existen acceso denegado
            }
        }
    }
}