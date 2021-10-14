<?php

class PlayerModel{

    private $db;


    function __construct(){
         $this->db = new PDO('mysql:host=localhost;'.'dbname=db_selecciones_futbol;charset=utf8', 'root', '');
    }

    //crea un nuevo jugador en la seleecion
    function insertPlayer($nombre,$apellido,$numeroCamiseta,$equipo,$posicion,$edad,$id) {
        $query = $this->db->prepare("INSERT INTO jugadores(nombre, apellido,numero_camiseta, equipo, posicion, edad, fk_id_nacionalidad) VALUES(?, ?, ?, ?,?,?,?)");
        $query->execute(array($nombre,$apellido,$numeroCamiseta,$equipo, $posicion,$edad,$id));
    }
    //elimina un jugador
    function deletePlayerFromDB($id) {
        $query = $this->db->prepare("DELETE FROM jugadores WHERE id_jugador=?");
        $query->execute(array($id));

    }
    //trae un jugador en particular
    function getPlayerFromDB($id){
        $query = $this->db->prepare("SELECT * FROM jugadores JOIN nacionalidad WHERE jugadores.fk_id_nacionalidad = nacionalidad.id_nacionalidad AND id_jugador = ?");
        $query->execute(array($id));
        $player = $query->fetch(PDO::FETCH_OBJ);
        return $player;
    }
    //modifica un jugador
    function modifyPlayerFromDB($id, $nombre, $apellido,$numeroCamiseta, $equipo, $posicion,$edad){
        $query = $this->db->prepare("UPDATE jugadores SET nombre = ?, apellido = ?, numero_camiseta = ?, equipo = ?, posicion = ?, edad = ? WHERE id_jugador = ?");
        $query->execute(array($nombre, $apellido,$numeroCamiseta, $equipo, $posicion,$edad, $id));
    }

}