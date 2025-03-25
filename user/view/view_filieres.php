<?php
require_once '../config/database.php';

try {
    $sql = "SELECT f.*, u.login as createur 
            FROM Filiere f 
            LEFT JOIN Utilisateur u ON f.id_utilisateur = u.id_utilisateur 
            ORDER BY f.nom";
    $stmt = $conn->query($sql);
    $filieres = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    header('Content-Type: application/json');
    echo json_encode(['success' => true, 'data' => $filieres]);
} catch(PDOException $e) {
    header('Content-Type: application/json');
    echo json_encode(['success' => false, 'error' => 'Erreur lors de la récupération des filières']);
}
