<?php
session_start();
require_once '../../config/database.php';


$id_cycle = $_GET['id'] ?? null;

if ($id_cycle) {
    try {
        $sql = "DELETE FROM Cycle WHERE id_cycle = :id";
        $stmt = $conn->prepare($sql);
        $stmt->execute([':id' => $id_cycle]);
        
        $_SESSION['success'] = "Le cycle a été supprimé avec succès.";
    } catch(PDOException $e) {
        $_SESSION['error'] = "Une erreur est survenue lors de la suppression du cycle.";
    }
}

header('Location: ../../list/cycles.php');
exit();
