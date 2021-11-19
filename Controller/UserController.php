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
        $role = $this->authHelper->getRole();
        if($role == false){
            $users = $this->model->getUsers();   
            $this->view->showUsers($users);
        }else{
            $this->view->showLogin();
        }
    }

    function changeRole($userEmail, $userRole){
        $role = $this->authHelper->getRole();
        if($role == false){
            if($userRole == false){
                $this->model->removeAdmin($userEmail);                
            }
            if($userRole == true){
                $this->model->addAdmin($userEmail);
            }
            $this->showUsers();
        }else{
            $this->view->showLogin();
        }    

    }

    function deleteUser($userEmail){
        $role = $this->authHelper->getRole();
        if($role == false){
            $this->model->deleteUser($userEmail);
            $this->showUsers();
        }else{
            $this->view->showLogin();
        }    
    }


}