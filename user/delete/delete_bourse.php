<?php
session_start();
require_once '../../config/database.php';
include_once '../include/auth.php';

if(!isLoggedIn() && isAdmin()){
    header('Location:../../login.php');
    exit();
}


$id_bourse = $_GET['id'] ?? null;

$check=$conn->prepare('SELECT * FROM bourse WHERE id_bourse=:id');
$check->execute(['id'=>$id_bourse]);

if($check->fetchColumn()==0){
    $_SESSION['error']= "La bourse  n'a pas éte trouvé";
    header('Location: ../bourses.php');
    exit();
}

if ($id_bourse) {
    try {
        $sql = "DELETE FROM Bourse WHERE id_bourse = :id";
        $stmt = $conn->prepare($sql);
        $stmt->execute([':id' => $id_bourse]);
        
        $_SESSION['success'] = "La bourse a été supprimée avec succès.";
    } catch(PDOException $e) {
        $_SESSION['error'] = "Une erreur est survenue lors de la suppression de la bourse.";
    }
}

header('Location: ../bourses.php');
exit();
