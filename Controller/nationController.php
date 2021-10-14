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

        $name = $this->authHelper->getName();
        $nations = $this->model->getNations();   
        $this->view->showHome($nations, $logged, $name); 
    }

    //trae una seleccion del model y se la pasa al view
    function showNation($id){
        $logged = $this->authHelper->checkLoggedIn();
        
        $Nations = $this->model->getNation($id);
        $this->view->showNation($Nations, $logged, $id);

    }

    //crea una nuyeva seleccion(solo si el usuario esta logueado)
    function createNation(){
        $logged = $this->authHelper->checkLoggedIn();
        if($logged == true){
            $this->model->insertNation( $_POST['seleccion']);
            $this->view->showHomeLocation();
        }
    }
    //elimina una seleccion elegida (solo si el usuario esta logueado)
    function deleteNation($id) {
        $logged = $this->authHelper->checkLoggedIn();
        if($logged == true){            
            $this->model->deleteNationFromDB($id);
            $this->view->showHomeLocation();
        }
    }

    //modifica una seleccion elegida (solo si el usuario esta logueado)
    function modifyNation($id){
        $logged = $this->authHelper->checkLoggedIn();
        if($logged == true){
            $this->model->modifyNationFromDB($id, $_POST['nombre_seleccion']);
            $nation = $this->model->getNation($id);
            $this->view->showNation($nation, $logged, $id);
        }
    }    

}
    
