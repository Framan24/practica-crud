<?php
include('db.php');
$con = DataBase();
$sql = "SELECT * FROM maestros";

try {
    $stmt = $con->prepare($sql);
    $stmt->execute();
    $resultados = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    echo "Error en la consulta: " . $e->getMessage();
    $resultados = array(); 
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div>
        <h1>Crear usuario</h1>
        <form action="crearpersona.php" method="POST">
            <input type="text" name="nombre" placeholder="nombre">
            <input type="text" name="correo" placeholder="correo">
            <input type="submit" value="crear">
        </form>
    </div>
    <div>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Correo</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($resultados as $fila) : ?>
                    <tr>
                        <td><?= $fila['id']; ?></td>
                        <td><?= $fila['nombre']; ?></td>
                        <td><?= $fila['correo']; ?></td>
                        <td>
                        <a href="editar.php?id=<?= $fila['id']; ?>">Editar</a>
                        <a href="eliminar.php?id=<?= $fila['id']; ?>">Eliminar</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</body>
</html>
