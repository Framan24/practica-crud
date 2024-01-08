<?php
include('db.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $con = DataBase();

    $id = $_POST['id'];
    $nombre = $_POST['nombre'];
    $correo = $_POST['correo'];

    try {
        $sql = "UPDATE maestros SET nombre = :nombre, correo = :correo WHERE id = :id";
        $stmt = $con->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->bindParam(':nombre', $nombre, PDO::PARAM_STR);
        $stmt->bindParam(':correo', $correo, PDO::PARAM_STR);
        $stmt->execute();
        header("Location: index.php");
        exit;
    } catch (PDOException $e) {
        echo "Error en la actualización: " . $e->getMessage();
        exit;
    }
} else {
    echo "Acceso no permitido.";
    exit;
}
?>
