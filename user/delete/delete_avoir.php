<?php
session_start();
require_once '../../config/database.php';


$id_filiere = $_GET['filiere'] ?? null;
$id_cycle = $_GET['cycle'] ?? null;

if ($id_filiere && $id_cycle) {
    try {
        $sql = "DELETE FROM Avoir WHERE id_filiere = :id_filiere AND id_cycle = :id_cycle";
        $stmt = $conn->prepare($sql);
        $stmt->execute([
            ':id_filiere' => $id_filiere,
            ':id_cycle' => $id_cycle
        ]);
        
        $_SESSION['success'] = "L'association a été supprimée avec succès.";
    } catch(PDOException $e) {
        $_SESSION['error'] = "Une erreur est survenue lors de la suppression de l'association.";
    }
}

header('Location: avoir.php');
exit();
