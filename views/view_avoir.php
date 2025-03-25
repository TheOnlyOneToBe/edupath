<?php
require_once '../config/database.php';

try {
    $sql = "SELECT a.*, f.nom as nom_filiere, c.nom as nom_cycle, c.nbre_annee
            FROM Avoir a
            JOIN Filiere f ON a.id_filiere = f.id_filiere
            JOIN Cycle c ON a.id_cycle = c.id_cycle
            ORDER BY f.nom, c.nom";
    $stmt = $conn->query($sql);
    $frais = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    header('Content-Type: application/json');
    echo json_encode(['success' => true, 'data' => $frais]);
} catch(PDOException $e) {
    header('Content-Type: application/json');
    echo json_encode(['success' => false, 'error' => 'Erreur lors de la récupération des frais']);
}
