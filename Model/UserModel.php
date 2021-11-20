<?php

class UserModel{

    private $db;


    function __construct(){
         $this->db = new PDO('mysql:host=localhost;'.'dbname=db_selecciones_futbol;charset=utf8', 'root', '');
    }

    function getUsers(){
        $query = $this->db->prepare("SELECT * FROM users");
        $query->execute();
        $users = $query->fetchAll(PDO::FETCH_OBJ);
        return $users;
        
    }

    function removeAdmin($userEmail){
        $query = $this->db->prepare("UPDATE users SET admin = ? WHERE email = ?");
        $query->execute(array(0, $userEmail));
    }

    function addAdmin($userEmail){
        $query = $this->db->prepare("UPDATE users SET admin = ? WHERE email = ?");
        $query->execute(array(1, $userEmail));
    }

    function deleteUser($email) {
        $query = $this->db->prepare("DELETE FROM users WHERE email=?");
        $query->execute(array($email));
    }

    //envia los datos del nuevo usuario a la BD
    function postUser($userName, $userSurname,$userBirthday,$userEmail,$userPassword) {
        $query = $this->db->prepare('INSERT INTO users(name, surname, birthday, email, password) VALUES (?,?,?,?,?)');
        $query->execute(array($userName, $userSurname,$userBirthday,$userEmail,$userPassword));
    }

    //trae el usuario correspondiente al email de la BD
    function getUser($email){
    $query = $this->db->prepare('SELECT * FROM users WHERE email = ?');
    $query->execute([$email]);
    return $query->fetch(PDO::FETCH_OBJ);
        
    }


}