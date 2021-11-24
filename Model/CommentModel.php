<?php

class CommentModel{

    private $db;


    function __construct(){
          $this->db = new PDO('mysql:host=localhost;'.'dbname=db_selecciones_futbol;charset=utf8', 'root', '');
    }

    //trae los comentarios de la db y hace un join con los usuarios
    function getComments(){
          $query = $this->db->prepare("SELECT * FROM comentarios JOIN users WHERE comentarios.fk_email_usuario = users.email");
          $query->execute(array());
          $comments = $query->fetchAll(PDO::FETCH_OBJ);
          return $comments;
    }

    //trae un comentario con el id pasado por parametro
    function getComment($id){
      $sentencia = $this->db->prepare( "SELECT * FROM comentarios WHERE id_comentario=?");
      $sentencia->execute(array($id));
      $comment = $sentencia->fetch(PDO::FETCH_OBJ);
      return $comment;
  }

    //añade un comentario a la db
    function addComment($email, $comment, $date, $player, $points, $time){
      $sentencia = $this->db->prepare("INSERT INTO comentarios (fk_email_usuario, comentario, fecha, id_jugador, puntos, hora ) VALUES(?, ?, ?, ?, ?, ?)");
      $sentencia->execute(array($email, $comment, $date, $player, $points, $time));
      return $this->db->lastInsertId();
    }
  
    //eleimina un comentario de la db
    function deleteComment($id){
      $sentencia = $this->db->prepare("DELETE FROM comentarios WHERE id_comentario=?");
      $response = $sentencia->execute(array($id));
  }
    
}    