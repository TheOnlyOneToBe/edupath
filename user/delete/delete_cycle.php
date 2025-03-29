<?php
session_start();
require_once '../../config/database.php';


$id_cycle = $_GET['id'] ?? null;

if ($id_cycle) {
    try {
        $sl= "SELECT * FROM avoir WHERE id_cycle = :id";
        $st=$conn->prepare($sl);
        $st->execute([':id' => $id_cycle]);
        if($st->fetchColumn() > 0){
            $_SESSION['error'] = "Impossible de supprimer ce cycle car il est lié à une ou plusieurs formations.";
            header('Location: ../cycles.php');
            exit();
        }
        else {
            $sql = "DELETE FROM Cycle WHERE id_cycle = :id";
            $stmt = $conn->prepare($sql);
            $stmt->execute([':id' => $id_cycle]);
            
            $_SESSION['success'] = "Le cycle a été supprimé avec succès.";
            header('Location: ../cycles.php');
        }
       
    } catch(PDOException $e) {
        $_SESSION['error'] = "Une erreur est survenue lors de la suppression du cycle.";
    }
}


exit();
