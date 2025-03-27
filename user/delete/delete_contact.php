<?php
session_start();
require_once '../../config/database.php';

// Get contact ID from URL parameter
$id_contact = $_GET['id'] ?? null;

if (!$id_contact) {
    $_SESSION['error'] = "ID de contact non spécifié.";
    header('Location: contacts.php');
    exit();
}

try {
    // Check if contact exists
    $check_sql = "SELECT COUNT(*) FROM Contact WHERE id_contact = :id";
    $check_stmt = $conn->prepare($check_sql);
    $check_stmt->execute([':id' => $id_contact]);
    
    if ($check_stmt->fetchColumn() == 0) {
        $_SESSION['error'] = "Ce message n'existe pas.";
        header('Location: contacts.php');
        exit();
    }
    
    // Delete the contact
    $sql = "DELETE FROM Contact WHERE id_contact = :id";
    $stmt = $conn->prepare($sql);
    $stmt->execute([':id' => $id_contact]);
    
    $_SESSION['success'] = "Le message a été supprimé avec succès.";
    header('Location: contacts.php');
    exit();
    
} catch(PDOException $e) {
    $_SESSION['error'] = "Erreur lors de la suppression du message.";
    header('Location: contacts.php');
    exit();
}