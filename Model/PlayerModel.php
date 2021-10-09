<?php

class PlayerModel{

    private $db;


    function __construct(){
         $this->db = new PDO('mysql:host=localhost;'.'dbname=db_selecciones_futbol;charset=utf8', 'root', '');
    }

    function getPlayers(){
        $sentencia = $this->db->prepare( "select * from jugadores");
        $sentencia->execute();
        $players = $sentencia->fetchAll(PDO::FETCH_OBJ);
        return $players;
    } 

    function insertPlayer($nombre,$apellido,$equipo,$posicion,$nacionalidad) {
        $query = $this->db->prepare("INSERT INTO jugadores(nombre, apellido, equipo, posicion, fk_id_nacionalidad) VALUES(?, ?, ?, ?,?)");
        $query->execute(array($nombre,$apellido,$equipo, $posicion,$nacionalidad ));
    }

}