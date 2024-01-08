<?php
include('db.php');

if (isset($_GET['id'])) {
    $con = DataBase();
    $id = $_GET['id'];

    try {
        $sql = "SELECT * FROM maestros WHERE id = :id";
        $stmt = $con->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        $maestro = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!$maestro) {
            echo "Maestro no encontrado.";
            exit;
        }
    } catch (PDOException $e) {
        echo "Error en la consulta: " . $e->getMessage();
        exit;
    }
} else {
    echo "ID no proporcionado para editar.";
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Maestro</title>
</head>
<body>
    <h1>Editar Maestro</h1>
    <form action="actualizarmaestro.php" method="POST">
        <input type="hidden" name="id" value="<?= $maestro['id']; ?>">
        <label for="nombre">Nombre:</label>
        <input type="text" name="nombre" value="<?= $maestro['nombre']; ?>"><br>
        <label for="correo">Correo:</label>
        <input type="text" name="correo" value="<?= $maestro['correo']; ?>"><br>
        <input type="submit" value="Actualizar">
    </form>
    <a href="index.php">Volver a la lista de maestros</a>
</body>
</html>
