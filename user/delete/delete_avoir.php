<?php
session_start();
require_once '../../config/database.php';

$id_filiere = $_GET['filiere'] ?? null;
$id_cycle = $_GET['cycle'] ?? null;

if ($id_filiere && $id_cycle) {
    try {
        // Récupérer les informations avant suppression pour le message de confirmation
        $sql = "SELECT f.nom as nom_filiere, c.nom as nom_cycle 
                FROM Avoir a 
                JOIN Filiere f ON a.id_filiere = f.id_filiere 
                JOIN Cycle c ON a.id_cycle = c.id_cycle 
                WHERE a.id_filiere = :id_filiere AND a.id_cycle = :id_cycle";
        $stmt = $conn->prepare($sql);
        $stmt->execute([
            ':id_filiere' => $id_filiere,
            ':id_cycle' => $id_cycle
        ]);
        $info = $stmt->fetch(PDO::FETCH_ASSOC);
        
        // Supprimer l'association
        $sql = "DELETE FROM Avoir WHERE id_filiere = :id_filiere AND id_cycle = :id_cycle";
        $stmt = $conn->prepare($sql);
        $stmt->execute([
            ':id_filiere' => $id_filiere,
            ':id_cycle' => $id_cycle
        ]);
        
        if ($info) {
            $_SESSION['success'] = "Les frais pour la filière '{$info['nom_filiere']}' et le cycle '{$info['nom_cycle']}' ont été supprimés avec succès.";
        } else {
            $_SESSION['success'] = "L'association a été supprimée avec succès.";
        }
    } catch(PDOException $e) {
        $_SESSION['error'] = "Une erreur est survenue lors de la suppression de l'association: " . $e->getMessage();
    }
}

header('Location:../avoir.php');
exit();
?>
