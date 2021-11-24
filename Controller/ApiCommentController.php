<?php

require_once "./Model/CommentModel.php";
require_once "./View/ApiView.php";

class ApiCommentController{
    
    private $model;
    private $view;

    function __construct() {

        $this->model = new CommentModel();
        $this->view = new ApiView();

    }

    function getComments(){
        $comments = $this->model->getComments();
        return $this->view->response($comments, 200);
       
    }

    //obtiene el POST y lo devuelve en formato JSON
    private function getBody() {
        $bodyString = file_get_contents("php://input");
        return json_decode($bodyString);
    }

    function addComment($params = null) {
        $body = $this->getBody();

        $id = $this->model->addComment($body->email, $body->comment, $body->date, $body->player, $body->points, $body->date);
        if ($id != 0) {
            $this->view->response("El comentario ha sido publicado con el id=$id", 201);
        } else {
            $this->view->response("No pudo publicarse el comentario", 500);
        }
    }
    

    function deleteComment($params = null) {
        $idComment = $params[":ID"];
        $comment = $this->model->getComment($idComment);

        if ($comment) {
            $this->model->deleteComment($idComment);
            return $this->view->response("El comentario con el id=$idComment fue borrado", 200);
        } else {
            return $this->view->response("El comentario con el id=$idComment no existe", 404);
        }
    }
}