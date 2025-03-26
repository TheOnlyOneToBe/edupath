<?php
session_start();
require_once '../../config/database.php';


$id_bourse = $_GET['id'] ?? null;

if ($id_bourse) {
    try {
        $sql = "DELETE FROM Bourse WHERE id_bourse = :id";
        $stmt = $conn->prepare($sql);
        $stmt->execute([':id' => $id_bourse]);
        
        $_SESSION['success'] = "La bourse a été supprimée avec succès.";
    } catch(PDOException $e) {
        $_SESSION['error'] = "Une erreur est survenue lors de la suppression de la bourse.";
    }
}

header('Location: ../list/bourses.php');
exit();
