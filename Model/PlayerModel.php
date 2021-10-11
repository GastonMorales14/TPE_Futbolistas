<?php

class PlayerModel{

    private $db;


    function __construct(){
         $this->db = new PDO('mysql:host=localhost;'.'dbname=db_selecciones_futbol;charset=utf8', 'root', '');
    }

    function getPlayers(){
        $sentencia = $this->db->prepare( "SELECT * FROM jugadores");
        $sentencia->execute();
        $players = $sentencia->fetchAll(PDO::FETCH_OBJ);
        return $players;
    } 

    function insertPlayer($nombre,$apellido,$equipo,$posicion,$nacionalidad) {
        $query = $this->db->prepare("INSERT INTO jugadores(nombre, apellido, equipo, posicion, fk_id_nacionalidad) VALUES(?, ?, ?, ?,?)");
        $query->execute(array($nombre,$apellido,$equipo, $posicion,$nacionalidad ));
    }

    function deletePlayerFromDB($id) {
        $query = $this->db->prepare("DELETE FROM jugadores WHERE id_jugador=?");
        $query->execute(array($id));

    }

    function getPlayerFromDB($id){
        $query = $this->db->prepare("SELECT * FROM jugadores WHERE id_jugador = ?");
        $query->execute(array($id));
        $player = $query->fetch(PDO::FETCH_OBJ);
        return $player;
    }

    function modifyPlayerFromDB($id, $nombre, $apellido, $equipo, $posicion, $nacionalidad){
        $query = $this->db->prepare("UPDATE jugadores SET nombre = ?, apellido = ?, equipo = ?, posicion = ?, fk_id_nacionalidad = ? WHERE id_jugador = ?");
        $query->execute(array($nombre, $apellido, $equipo, $posicion, $nacionalidad, $id));
    }

}