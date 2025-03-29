<?php
session_start();
require_once '../../config/database.php';


$id_filiere = $_GET['id'] ?? null;

if ($id_filiere) {
    try {
        $sql = "DELETE FROM Filiere WHERE id_filiere = :id";
        $stmt = $conn->prepare($sql);
        $stmt->execute([':id' => $id_filiere]);
        
        $_SESSION['success'] = "La filière a été supprimée avec succès.";
    } catch(PDOException $e) {
        $_SESSION['error'] = "Une erreur est survenue lors de la suppression de la filière.";
    }
}

header('Location: ../filieres.php');
exit();
