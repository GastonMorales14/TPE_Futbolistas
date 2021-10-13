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

    function showHome(){
        $logged = $this->authHelper->checkLoggedIn();

        $name = $this->authHelper->getName();
        $nations = $this->model->getNations();
        $this->view->showHome($nations, $logged, $name);
    }

    function showNation($id){
        $logged = $this->authHelper->checkLoggedIn();
        
        $Nations = $this->model->getNation($id);
        $this->view->showNation($Nations, $logged, $id);

    }

    function createNation(){
        $logged = $this->authHelper->checkLoggedIn();
        if($logged == true){
            $this->model->insertNation( $_POST['seleccion']);
            $this->view->showHomeLocation();
        }
    }

    function deleteNation($id) {
        $logged = $this->authHelper->checkLoggedIn();
        if($logged == true){            
            $this->model->deleteNationFromDB($id);
            $this->view->showHomeLocation();
        }
    }

    function modifyNation($id){
        $logged = $this->authHelper->checkLoggedIn();
        if($logged == true){
            $this->model->modifyNationFromDB($id, $_POST['nombre_seleccion']);
            $nation = $this->model->getNation($id);
            $this->view->showNation($nation, $logged, $id);
        }
    }    

}
    
