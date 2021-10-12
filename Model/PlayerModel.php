<?php

class PlayerModel{

    private $db;


    function __construct(){
         $this->db = new PDO('mysql:host=localhost;'.'dbname=db_selecciones_futbol;charset=utf8', 'root', '');
    }
    function getNations(){
        $query = $this->db->prepare( "SELECT * FROM nacionalidad");
        $query->execute();
        $nations = $query->fetchAll(PDO::FETCH_OBJ);
        return $nations;
    }

    function getPlayers($id){
        $query = $this->db->prepare( "SELECT * FROM jugadores JOIN nacionalidad WHERE jugadores.fk_id_nacionalidad = nacionalidad.id_nacionalidad AND jugadores.fk_id_nacionalidad = ?");
        $query->execute(array($id));
        $players = $query->fetchAll(PDO::FETCH_OBJ);
        return $players;
    }

    function insertPlayer($nombre,$apellido,$numeroCamiseta,$equipo,$posicion,$edad,$nacionalidad) {
        $query = $this->db->prepare("INSERT INTO jugadores(nombre, apellido,numero_camiseta, equipo, posicion, edad, fk_id_nacionalidad) VALUES(?, ?, ?, ?,?,?,?)");
        $query->execute(array($nombre,$apellido,$numeroCamiseta,$equipo, $posicion,$edad,$nacionalidad ));
    }

    function deletePlayerFromDB($id) {
        $query = $this->db->prepare("DELETE FROM jugadores WHERE id_jugador=?");
        $query->execute(array($id));

    }

    function getPlayerFromDB($id){
        $query = $this->db->prepare("SELECT * FROM jugadores JOIN nacionalidad WHERE jugadores.fk_id_nacionalidad = nacionalidad.id_nacionalidad AND id_jugador = ?");
        $query->execute(array($id));
        $player = $query->fetch(PDO::FETCH_OBJ);
        return $player;
    }

    function modifyPlayerFromDB($id, $nombre, $apellido,$numeroCamiseta, $equipo, $posicion,$edad, $nacionalidad){
        $query = $this->db->prepare("UPDATE jugadores SET nombre = ?, apellido = ?, numero_camiseta = ?, equipo = ?, posicion = ?, edad = ?, fk_id_nacionalidad = ? WHERE id_jugador = ?");
        $query->execute(array($nombre, $apellido,$numeroCamiseta, $equipo, $posicion,$edad, $nacionalidad, $id));
    }

}