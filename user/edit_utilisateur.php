<?php
session_start();
require_once '../config/database.php';



$success = $error = '';
$utilisateur = null;

// Récupération de l'ID de l'utilisateur
$id_utilisateur = $_GET['id'] ?? null;

if (!$id_utilisateur) {
    header('Location: utilisateurs.php');
    exit();
}

// Liste des fonctions disponibles
$fonctions = ['admin', 'gestionnaire', 'enseignant', 'etudiant'];

// Traitement du formulaire de modification
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $login = $_POST['login'] ?? '';
    $fonction = $_POST['fonction'] ?? '';
    $new_password = $_POST['new_password'] ?? '';

    if (!empty($login) && !empty($fonction)) {
        try {
            // Vérifier si le login existe déjà pour un autre utilisateur
            $stmt = $conn->prepare("SELECT COUNT(*) FROM Utilisateur WHERE login = :login AND id_utilisateur != :id");
            $stmt->execute([
                ':login' => $login,
                ':id' => $id_utilisateur
            ]);
            if ($stmt->fetchColumn() > 0) {
                $error = "Ce login est déjà utilisé.";
            } else {
                if (!empty($new_password)) {
                    // Mise à jour avec nouveau mot de passe
                    $hashed_password = password_hash($new_password, PASSWORD_DEFAULT);
                    $sql = "UPDATE Utilisateur SET login = :login, password = :password, fonction = :fonction 
                            WHERE id_utilisateur = :id";
                    $params = [
                        ':login' => $login,
                        ':password' => $hashed_password,
                        ':fonction' => $fonction,
                        ':id' => $id_utilisateur
                    ];
                } else {
                    // Mise à jour sans changer le mot de passe
                    $sql = "UPDATE Utilisateur SET login = :login, fonction = :fonction 
                            WHERE id_utilisateur = :id";
                    $params = [
                        ':login' => $login,
                        ':fonction' => $fonction,
                        ':id' => $id_utilisateur
                    ];
                }

                $stmt = $conn->prepare($sql);
                $stmt->execute($params);
                $success = "L'utilisateur a été modifié avec succès!";
                
                // Si l'utilisateur modifie son propre compte, mettre à jour la session
                if ($id_utilisateur == $_SESSION['user']['user_id']) {
                    $_SESSION['user']['user_login'] = $login;
                    $_SESSION['user']['user_fonction'] = $fonction;
                }
                
                header('Location: utilisateurs.php');
                exit();
            }
        } catch(PDOException $e) {
            $error = "Une erreur est survenue lors de la modification de l'utilisateur.";
        }
    } else {
        $error = "Le login et la fonction sont requis.";
    }
}

// Récupération des données de l'utilisateur
try {
    $sql = "SELECT * FROM Utilisateur WHERE id_utilisateur = :id";
    $stmt = $conn->prepare($sql);
    $stmt->execute([':id' => $id_utilisateur]);
    $utilisateur = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$utilisateur) {
        header('Location: utilisateurs.php');
        exit();
    }
} catch(PDOException $e) {
    $error = "Erreur lors de la récupération des données de l'utilisateur.";
}
?>

<!DOCTYPE html>
<html class="no-js" lang="fr">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>Modifier l'Utilisateur - EduPath</title>
    <?php include_once 'css.php'; ?>
</head>
<body>
    <?php include_once 'magic.php'; ?>

    <section class="section-gap">
        <div class="container">
            <div class="row">
                <div class="col-6">
                    <h2 class="text-center mb-4">Modifier l'Utilisateur</h2>
                    
                    <?php if ($success): ?>
                        <div class="alert alert-success"><?php echo $success; ?></div>
                    <?php endif; ?>
                    
                    <?php if ($error): ?>
                        <div class="alert alert-danger"><?php echo $error; ?></div>
                    <?php endif; ?>

                    <div class="card">
                        <div class="card-body">
                            <form method="POST" action="">
                                <div class="mb-3">
                                    <label for="login" class="form-label">Login *</label>
                                    <input type="text" class="form-control" id="login" name="login" 
                                           value="<?php echo htmlspecialchars($utilisateur['login']); ?>" required>
                                </div>
                                <div class="mb-3">
                                    <label for="new_password" class="form-label">Nouveau mot de passe</label>
                                    <div class="input-group">
                                        <input type="password" class="form-control" id="new_password" name="new_password">
                                        <button class="btn btn-outline-secondary" type="button" onclick="togglePassword('new_password')">
                                            <i class="fas fa-eye"></i>
                                        </button>
                                    </div>
                                    <small class="text-muted">Laissez vide pour conserver le mot de passe actuel</small>
                                </div>
                                <div class="mb-3">
                                    <label for="fonction" class="form-label">Fonction *</label>
                                    <select class="form-control" id="fonction" name="fonction" required>
                                        <?php foreach ($fonctions as $fonction): ?>
                                            <option value="<?php echo $fonction; ?>" 
                                                    <?php echo $utilisateur['fonction'] == $fonction ? 'selected' : ''; ?>>
                                                <?php echo ucfirst($fonction); ?>
                                            </option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <button type="submit" class="btn btn-primary">Enregistrer les modifications</button>
                                <a href="utilisateurs.php" class="btn btn-secondary">Retour</a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

      <?php include_once 'include/footer.php'; ?>
        </div>
    </div>

    <?php include_once 'script.php'; ?>
    <script>
        function togglePassword(id) {
            var element = document.getElementById(id);
            if (element.type === "password") {
                element.type = "text";
            } else {
                element.type = "password";
            }
        }
    </script>
</body>
</html>
