<?php
include_once './db.php';
try {
    $con = DataBase();
    
    $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $id = null;
    $nombre = $_POST['nombre'];
    $correo = $_POST['correo'];
    $sql = "INSERT INTO maestros( nombre, correo) VALUES (:nombre,:correo)";
    $stmt = $con->prepare($sql);
    $stmt->bindParam(':nombre', $nombre, PDO::PARAM_STR);
    $stmt->bindParam(':correo', $correo, PDO::PARAM_STR);
    $stmt->execute();
    header("location: index.php");
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
?>