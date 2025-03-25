<?php
require_once '../config/database.php';

try {
    $sql = "SELECT a.*, u.login as auteur 
            FROM Article a 
            LEFT JOIN Utilisateur u ON a.id_utilisateur = u.id_utilisateur 
            ORDER BY a.date_pub DESC";
    $stmt = $conn->query($sql);
    $articles = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    header('Content-Type: application/json');
    echo json_encode(['success' => true, 'data' => $articles]);
} catch(PDOException $e) {
    header('Content-Type: application/json');
    echo json_encode(['success' => false, 'error' => 'Erreur lors de la récupération des articles']);
}
