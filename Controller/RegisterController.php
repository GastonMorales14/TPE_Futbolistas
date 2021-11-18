<?php
require_once "./Model/RegisterModel.php";
require_once "./Model/LoginModel.php"; //agregue esto
require_once "./View/RegisterView.php";

class RegisterController {

    private $model;
    private $modelLogin; //agregue esto
    private $view;

    function __construct() {
        $this->model = new RegisterModel();
        $this->modelLogin = new UserModel(); //agregue esto
        $this->view = new RegisterView();        
    }

    function register(){
        $this->view->showRegister();
    }

    //crea un usuario con datos y contraseña hasheada y redirige a la home
    function createUser(){
        if(!empty($_POST['name'])&& !empty($_POST['surname']) && !empty($_POST['birthday']) && !empty($_POST['email'])&&!empty($_POST['password'])) {
            $userName=$_POST['name'];
            $userSurname=$_POST['surname'];
            $userBirthday=$_POST['birthday'];
            $userEmail=$_POST['email'];
            $userPassword = password_hash($_POST['password'], PASSWORD_BCRYPT);
        }
        $this->model->postUser($userName, $userSurname,$userBirthday,$userEmail,$userPassword);
        
        //agregue esto
        $user = $this->modelLogin->getUser($userEmail);
        $name = $user->name;
        
        //agregue esto
        session_start();
        $_SESSION['email'] = $userEmail;
        $_SESSION['name'] = $name;

        $this->view->showHomeLocation();
    }

}    