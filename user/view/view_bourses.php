<?php
require_once '../config/database.php';

try {
    $sql = "SELECT b.*, u.login as gestionnaire 
            FROM Bourse b 
            LEFT JOIN Utilisateur u ON b.id_utilisateur = u.id_utilisateur 
            ORDER BY b.id_bourse DESC";
    $stmt = $conn->query($sql);
    $bourses = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    header('Content-Type: application/json');
    echo json_encode(['success' => true, 'data' => $bourses]);
} catch(PDOException $e) {
    header('Content-Type: application/json');
    echo json_encode(['success' => false, 'error' => 'Erreur lors de la récupération des bourses']);
}
