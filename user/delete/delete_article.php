<?php
session_start();
require_once '../../config/database.php';

$id_article = $_GET['id'] ?? null;

if ($id_article) {
    try {
        // Récupérer le nom de la photo avant la suppression
        $sql = "SELECT photo FROM Article WHERE id_article = :id";
        $stmt = $conn->prepare($sql);
        $stmt->execute([':id' => $id_article]);
        $article = $stmt->fetch(PDO::FETCH_ASSOC);

        // Supprimer l'article
        $sql = "DELETE FROM Article WHERE id_article = :id";
        $stmt = $conn->prepare($sql);
        $stmt->execute([':id' => $id_article]);

        // Supprimer la photo si elle existe
        if ($article && !empty($article['photo']) && file_exists($article['photo'])) {
            unlink($article['photo']);
        }
        
        $_SESSION['success'] = "L'article a été supprimé avec succès.";
    } catch(PDOException $e) {
        $_SESSION['error'] = "Une erreur est survenue lors de la suppression de l'article.";
    }
}

header('Location: ../list/articles.php');
exit();
