<?php
include('db.php'); 

if(isset($_GET['id']) && !empty($_GET['id'])) {
    $con = DataBase();
    
    $id = $_GET['id'];

   
    $sql = "DELETE FROM maestros WHERE id = :id";

    try {
        $stmt = $con->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();

       
        header('Location: index.php');
        exit();
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
} else {
    
    echo "Invalid request. Please provide a valid 'id' parameter.";
}
?>
