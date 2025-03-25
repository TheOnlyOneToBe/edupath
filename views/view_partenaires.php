<?php
require_once '../config/database.php';

try {
    $sql = "SELECT * FROM Partenaire ORDER BY nom";
    $stmt = $conn->query($sql);
    $partenaires = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    header('Content-Type: application/json');
    echo json_encode(['success' => true, 'data' => $partenaires]);
} catch(PDOException $e) {
    header('Content-Type: application/json');
    echo json_encode(['success' => false, 'error' => 'Erreur lors de la récupération des partenaires']);
}
