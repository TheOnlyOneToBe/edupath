<?php
session_start();
require_once '../../config/database.php';
include_once '../include/auth.php';

if(!isLoggedIn() && isAdmin()){
    header('Location:../../login.php');
    exit();
}


$id_evenement = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);

$check=$conn->prepare('SELECT * FROM evenement WHERE id_evenement = :id');
$check->execute(['id'=>$id_evenement]);

if($check->fetchColumn()==0){
    $_SESSION['error']= "L'évenement  n'a pas éte trouvé";
    header('Location: ../evenements.php');
    exit();
}

if ($id_evenement) {
    try {
        // Vérifier si l'utilisateur est le propriétaire de l'événement
        $check_sql = "SELECT id_utilisateur FROM Evenement WHERE id_evenement = :id";
        $check_stmt = $conn->prepare($check_sql);
        $check_stmt->execute([':id' => $id_evenement]);
        $event = $check_stmt->fetch(PDO::FETCH_ASSOC);

        if ($event && $event['id_utilisateur'] == $_SESSION['id_utilisateur']) {
            $sql = "DELETE FROM Evenement WHERE id_evenement = :id";
            $stmt = $conn->prepare($sql);
            $stmt->execute([':id' => $id_evenement]);
            
            $_SESSION['success'] = "L'événement a été supprimé avec succès.";
        } else {
            $_SESSION['error'] = "Vous n'avez pas les permissions nécessaires.";
        }
    } catch(PDOException $e) {
        $_SESSION['error'] = "Une erreur est survenue lors de la suppression de l'événement.";
    }
} else {
    $_SESSION['error'] = "ID d'événement invalide.";
}

header('Location: ../evenements.php');
exit();
?>
