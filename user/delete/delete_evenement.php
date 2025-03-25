<?php
session_start();
require_once '../../config/database.php';


$id_evenement = $_GET['id'] ?? null;

if ($id_evenement) {
    try {
        $sql = "DELETE FROM Evenement WHERE id_evenement = :id";
        $stmt = $conn->prepare($sql);
        $stmt->execute([':id' => $id_evenement]);
        
        $_SESSION['success'] = "L'événement a été supprimé avec succès.";
    } catch(PDOException $e) {
        $_SESSION['error'] = "Une erreur est survenue lors de la suppression de l'événement.";
    }
}

header('Location: evenements.php');
exit();
