<?php

function DataBase(){
  
    $host = "localhost";
    $dbname = "practica";
    $username = "root";
    $password = "";

    try {
        $db = new PDO("mysql:host={$host};dbname={$dbname}", $username, $password);
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $db;
    } catch (PDOException $e) {
        throw new Exception("Error de conexión a la base de datos: " . $e->getMessage());
    }
    

}