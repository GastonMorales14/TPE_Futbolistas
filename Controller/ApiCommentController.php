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

    function getComments($params = []) {
        $comments = $this->model->getComments();
        return $this->view->response($comments, 200);
  }
  