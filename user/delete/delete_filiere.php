<?php
session_start();
require_once '../../config/database.php';


// Vérifier si l'utilisateur est connecté
if (!isset($_SESSION['user'])) {
    header('Location: login.php');
    exit();
}

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
