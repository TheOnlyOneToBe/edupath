<?php
session_start();
require_once '../../config/database.php';


$id_partenaire = $_GET['id'] ?? null;

if ($id_partenaire) {
    try {
        // Récupérer le nom de la photo avant la suppression
        $sql = "SELECT photo FROM Partenaire WHERE id_partenaire = :id";
        $stmt = $conn->prepare($sql);
        $stmt->execute([':id' => $id_partenaire]);
        $partenaire = $stmt->fetch(PDO::FETCH_ASSOC);

        // Supprimer le partenaire
        $sql = "DELETE FROM Partenaire WHERE id_partenaire = :id";
        $stmt = $conn->prepare($sql);
        $stmt->execute([':id' => $id_partenaire]);

        // Supprimer la photo si elle existe
        if ($partenaire && !empty($partenaire['photo']) && file_exists($partenaire['photo'])) {
            unlink($partenaire['photo']);
        }
        
        $_SESSION['success'] = "Le partenaire a été supprimé avec succès.";
    } catch(PDOException $e) {
        $_SESSION['error'] = "Une erreur est survenue lors de la suppression du partenaire.";
    }
}

header('Location: partenaires.php');
exit();
