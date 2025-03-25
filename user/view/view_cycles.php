<?php
require_once '../config/database.php';

try {
    $sql = "SELECT c.*, 
            (SELECT COUNT(DISTINCT id_filiere) FROM Avoir WHERE id_cycle = c.id_cycle) as nb_filieres
            FROM Cycle c 
            ORDER BY c.nom";
    $stmt = $conn->query($sql);
    $cycles = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    header('Content-Type: application/json');
    echo json_encode(['success' => true, 'data' => $cycles]);
} catch(PDOException $e) {
    header('Content-Type: application/json');
    echo json_encode(['success' => false, 'error' => 'Erreur lors de la récupération des cycles']);
}
