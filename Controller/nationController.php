<?php
require_once "./Model/NationModel.php";
require_once "./View/NationView.php";
require_once "./Helpers/AuthHelper.php";

class NationController{
    
    private $model;
    private $view;
    private $authHelper;

    function __construct() {

        $this->model = new NationModel();
        $this->view = new NationView();
        $this->authHelper = new AuthHelper();

    }

    // trae todas las selecciones del model y se las pasa al view
    function showHome(){
        $logged = $this->authHelper->checkLoggedIn();
        if($logged == true){
            $role = $this->authHelper->getRole();
            $name = $this->authHelper->getName();
            $nations = $this->model->getNations();   
            $this->view->showHome($nations, $logged, $role, $name);
        }else{
            $this->view->showLogin();
        }

    }

    //trae una seleccion del model y se la pasa al view
    function showNation($id){
        $logged = $this->authHelper->checkLoggedIn();
        if($logged == true){
            $role = $this->authHelper->getRole();
            $Nations = $this->model->getNation($id);
            $this->view->showNation($Nations, $role, $id);
        }else{
            $this->view->showLogin();
        }
    }

    //crea una nuyeva seleccion(solo si el usuario esta logueado)
    function createNation(){
        $logged = $this->authHelper->checkLoggedIn();
        if($logged == true){
            $role = $this->authHelper->getRole();
            if($role == 1){
                $this->model->insertNation( $_POST['seleccion']);
                $this->view->showHomeLocation();
            }else{
                echo("Pagina no disponible");
            }
        }else{
            $this->view->showLogin();
        }
    }
    //elimina una seleccion elegida (solo si el usuario esta logueado)
    function deleteNation($id) {
        $logged = $this->authHelper->checkLoggedIn();
        if($logged == true){
            $role = $this->authHelper->getRole();
            if($role == 1){            
                $this->model->deleteNationFromDB($id);
                $this->view->showHomeLocation();
            }else{
                echo("Pagina no disponible");
            }
        }else{
            $this->view->showLogin();
        }
    }

    //modifica una seleccion elegida (solo si el usuario esta logueado)
    function modifyNation($id){
        $logged = $this->authHelper->checkLoggedIn();
        if($logged == true){
            $role = $this->authHelper->getRole();
            if($role == 1){
                $this->model->modifyNationFromDB($id, $_POST['nombre_seleccion']);
                $nation = $this->model->getNation($id);
                $this->view->showNation($nation, $role, $id);
            }else{
                echo("Pagina no disponible");
            }
        }else{
            $this->view->showLogin();
        }
    }

}
    
