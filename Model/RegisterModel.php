<?php


class RegisterModel {

    private $db;

    function __construct() {
       $this-> db = new PDO('mysql:host=localhost;'.'dbname=db_selecciones_futbol;charset=utf8', 'root', '');
        
    }

    function postUser($userName, $userSurname,$userBirthday,$userEmail,$userPassword) {
        $query = $this->db->prepare('INSERT INTO users(name, surname, birthday, email, password) VALUES (?,?,?,?,?)');
        $query->execute([$userName, $userSurname,$userBirthday,$userEmail,$userPassword]);
    }

}

