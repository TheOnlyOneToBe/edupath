<?php
require_once '../config/database.php';

try {
    $sql = "SELECT id_utilisateur, login, fonction FROM Utilisateur ORDER BY login";
    $stmt = $conn->query($sql);
    $utilisateurs = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    header('Content-Type: application/json');
    echo json_encode(['success' => true, 'data' => $utilisateurs]);
} catch(PDOException $e) {
    header('Content-Type: application/json');
    echo json_encode(['success' => false, 'error' => 'Erreur lors de la récupération des utilisateurs']);
}
