<?php
session_start();
require_once '../../config/database.php';


// Vérifier si l'utilisateur est connecté et a la fonction d'administrateur
if (!isset($_SESSION['user']) || $_SESSION['user']['user_fonction'] !== 'admin') {
    header('Location: login.php');
    exit();
}

$id_utilisateur = $_GET['id'] ?? null;

// Empêcher la suppression de son propre compte
if ($id_utilisateur && $id_utilisateur != $_SESSION['user']['user_id']) {
    try {
        $sql = "DELETE FROM Utilisateur WHERE id_utilisateur = :id";
        $stmt = $conn->prepare($sql);
        $stmt->execute([':id' => $id_utilisateur]);
        
        $_SESSION['success'] = "L'utilisateur a été supprimé avec succès.";
    } catch(PDOException $e) {
        $_SESSION['error'] = "Une erreur est survenue lors de la suppression de l'utilisateur.";
    }
}

header('Location: ../utilisateurs.php');
exit();
