<?php
session_start();
require_once '../../config/database.php';

$id_utilisateur = $_GET['id'] ?? null;
$check = $conn->prepare('SELECT * FROM Utilisateur WHERE id_utilisateur = :id');
$check->execute(['id' => $id_utilisateur]);

if ($check->fetchColumn() == 0) {
    $_SESSION['error'] = "L'utilisateur n'existe pas n'a pas éte trouvé";
    header('Location: ../utilisateurs.php');
    exit();
}

// Empêcher la suppression de son propre compte
if ($id_utilisateur && $id_utilisateur != $_SESSION['user']['user_id']) {
    try {
        $sql = "DELETE FROM Utilisateur WHERE id_utilisateur = :id";
        $stmt = $conn->prepare($sql);
        $stmt->execute([':id' => $id_utilisateur]);

        $_SESSION['success'] = "L'utilisateur a été supprimé avec succès.";
    } catch (PDOException $e) {
        $_SESSION['error'] = "Une erreur est survenue lors de la suppression de l'utilisateur.";
    }
}

header('Location: ../utilisateurs.php');
exit();
