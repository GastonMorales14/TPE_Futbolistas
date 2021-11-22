<?php

class CommentModel{

    private $db;


    function __construct(){
          $this->db = new PDO('mysql:host=localhost;'.'dbname=db_selecciones_futbol;charset=utf8', 'root', '');
    }

    function getComments($id){
          $query = $this->db->prepare("SELECT * FROM comentarios JOIN users WHERE comentarios.fk_email_usuario = users.email AND comentarios.fk_id_jugador = ?");
          $query->execute(array($id));
          $comments = $query->fetch(PDO::FETCH_OBJ);
          return $comments;
    }

    function getNation(){
     $query = $this->db->prepare( "SELECT * FROM jugadores");
     $query->execute(array());
     $players = $query->fetchAll(PDO::FETCH_OBJ);
     return $players;
    }
}    