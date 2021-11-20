<?php

require_once "./Model/UserModel.php";
require_once "./View/UserView.php";
require_once "./Helpers/AuthHelper.php";


class UserController{
    
    private $model;
    private $view;
    private $authHelper;

    function __construct() {

        $this->model = new UserModel();
        $this->view = new UserView();
        $this->authHelper = new AuthHelper();

    }


    function showUsers(){ 
        $logged = $this->authHelper->checkLoggedIn();
        if($logged == true){       
            $role = $this->authHelper->getRole();
            if($role == 1){
                $users = $this->model->getUsers();   
                $this->view->showUsers($users);
            }else{
                echo("Pagina no disponible");
            }
        }    
    }

    function changeRole($userEmail, $userRole){
        $logged = $this->authHelper->checkLoggedIn();
        if($logged == true){
            $role = $this->authHelper->getRole();
            if($role == 1){
                if($userRole == 1){
                    $this->model->removeAdmin($userEmail);                
                }
                if($userRole == 0){
                    $this->model->addAdmin($userEmail);
                }
                $this->showUsers();
            }else{
                echo("Pagina no disponible");
            }    
        }    
    }

    function deleteUser($userEmail){
        $logged = $this->authHelper->checkLoggedIn();
        if($logged == true){
            $role = $this->authHelper->getRole();
            if($role == 1){
                $this->model->deleteUser($userEmail);
                $this->showUsers();
            }else{
                echo("Pagina no disponible");
            }  
        }      
    }


}