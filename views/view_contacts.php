<?php
require_once '../config/database.php';

try {
    $sql = "SELECT * FROM Contact ORDER BY date_envoi DESC";
    $stmt = $conn->query($sql);
    $contacts = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    header('Content-Type: application/json');
    echo json_encode(['success' => true, 'data' => $contacts]);
} catch(PDOException $e) {
    header('Content-Type: application/json');
    echo json_encode(['success' => false, 'error' => 'Erreur lors de la récupération des messages']);
}
