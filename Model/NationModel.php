<?php

class NationModel{

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

    function getNation($id){
        $query = $this->db->prepare( "SELECT * FROM jugadores JOIN nacionalidad WHERE jugadores.fk_id_nacionalidad = nacionalidad.id_nacionalidad AND jugadores.fk_id_nacionalidad = ?");
        $query->execute(array($id));
        $players = $query->fetchAll(PDO::FETCH_OBJ);
        return $players;
    }

    function insertNation($seleccion) {
        $query = $this->db->prepare("INSERT INTO nacionalidad (nombre_seleccion) VALUES(?)");
        $query->execute(array($seleccion));
    }


/* Revisar */
    function deleteNationFromDB($id) {
        $query = $this->db->prepare("DELETE FROM nacionalidad WHERE id_nacionalidad=?");
        $query->execute(array($id));
        $query2 = $this->db->prepare("DELETE FROM jugadores WHERE fk_id_nacionalidad=?");
        $query2->execute(array($id));
    }

    function modifyNationFromDB($id, $nombreSeleccion) {
        $query = $this->db->prepare("UPDATE nacionalidad SET nombre_seleccion = ? WHERE id_nacionalidad = ?");
        $query->execute(array($nombreSeleccion, $id));

    }

}    