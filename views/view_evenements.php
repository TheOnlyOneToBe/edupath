<?php
require_once '../config/database.php';

try {
    $sql = "SELECT e.*, u.login as organisateur 
            FROM Evenement e 
            LEFT JOIN Utilisateur u ON e.id_utilisateur = u.id_utilisateur 
            ORDER BY e.id_evenement DESC";
    $stmt = $conn->query($sql);
    $evenements = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    header('Content-Type: application/json');
    echo json_encode(['success' => true, 'data' => $evenements]);
} catch(PDOException $e) {
    header('Content-Type: application/json');
    echo json_encode(['success' => false, 'error' => 'Erreur lors de la récupération des événements']);
}
