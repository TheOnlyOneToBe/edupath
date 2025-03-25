<?php
session_start();
require_once '../../config/database.php';

// Vérifier si l'utilisateur est connecté et a la fonction d'administrateur
if (!isset($_SESSION['user']) || $_SESSION['user']['user_fonction'] !== 'admin') {
    header('Location: login.php');
    exit();
}

$success = $error = '';

// Traitement du formulaire d'ajout
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $login = $_POST['login'] ?? '';
    $password = $_POST['password'] ?? '';
    $fonction = $_POST['fonction'] ?? '';

    if (!empty($login) && !empty($password) && !empty($fonction)) {
        try {
            // Vérifier si le login existe déjà
            $stmt = $conn->prepare("SELECT COUNT(*) FROM Utilisateur WHERE login = :login");
            $stmt->execute([':login' => $login]);
            if ($stmt->fetchColumn() > 0) {
                $error = "Ce login est déjà utilisé.";
            } else {
                // Hasher le mot de passe
                $hashed_password = password_hash($password, PASSWORD_DEFAULT);
                
                $sql = "INSERT INTO Utilisateur (login, password, fonction) VALUES (:login, :password, :fonction)";
                $stmt = $conn->prepare($sql);
                $stmt->execute([
                    ':login' => $login,
                    ':password' => $hashed_password,
                    ':fonction' => $fonction
                ]);
                $success = "L'utilisateur a été ajouté avec succès!";
            }
        } catch(PDOException $e) {
            $error = "Une erreur est survenue lors de l'ajout de l'utilisateur.";
        }
    } else {
        $error = "Tous les champs sont requis.";
    }
}

// Récupération des utilisateurs existants
try {
    $sql = "SELECT id_utilisateur, login, fonction FROM Utilisateur ORDER BY login";
    $stmt = $conn->query($sql);
    $utilisateurs = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch(PDOException $e) {
    $error = "Erreur lors de la récupération des utilisateurs.";
}

// Liste des fonctions disponibles
$fonctions = ['admin', 'gestionnaire', 'enseignant', 'etudiant'];
?>

<!DOCTYPE html>
<html class="no-js" lang="fr">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>Gestion des Utilisateurs - EduPath</title>
    <?php include_once '../edit/css.php'; ?>
</head>
<body>
    <?php include_once '../magic.php'; ?>

    <section class="section-gap">
        <div class="container">
            <div class="row mb-5">
                <div class="col-12">
                    <h2 class="text-center mb-4">Gestion des Utilisateurs</h2>
                    
                    <?php if ($success): ?>
                        <div class="alert alert-success"><?php echo $success; ?></div>
                    <?php endif; ?>
                    
                    <?php if ($error): ?>
                        <div class="alert alert-danger"><?php echo $error; ?></div>
                    <?php endif; ?>

                    <!-- Formulaire d'ajout -->
                    <div class="card mb-4">
                        <div class="card-header">
                            <h4>Ajouter un nouvel utilisateur</h4>
                        </div>
                        <div class="card-body">
                            <form method="POST" action="">
                                <div class="row">
                                    <div class="col-md-4 mb-3">
                                        <label for="login" class="form-label">Login *</label>
                                        <input type="text" class="form-control" id="login" name="login" required>
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label for="password" class="form-label">Mot de passe *</label>
                                        <div class="input-group">
                                            <input type="password" class="form-control" id="password" name="password" required>
                                            <button class="btn btn-outline-secondary" type="button" onclick="togglePassword('password')">
                                                <i class="fas fa-eye"></i>
                                            </button>
                                        </div>
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label for="fonction" class="form-label">Fonction *</label>
                                        <select class="form-control" id="fonction" name="fonction" required>
                                            <option value="">Sélectionnez une fonction</option>
                                            <?php foreach ($fonctions as $fonction): ?>
                                                <option value="<?php echo $fonction; ?>">
                                                    <?php echo ucfirst($fonction); ?>
                                                </option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary">Ajouter</button>
                            </form>
                        </div>
                    </div>

                    <!-- Liste des utilisateurs -->
                    <div class="card">
                        <div class="card-header">
                            <h4>Liste des utilisateurs</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Login</th>
                                            <th>Fonction</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($utilisateurs as $user): ?>
                                        <tr>
                                            <td><?php echo htmlspecialchars($user['id_utilisateur']); ?></td>
                                            <td><?php echo htmlspecialchars($user['login']); ?></td>
                                            <td><?php echo htmlspecialchars($user['fonction']); ?></td>
                                            <td>
                                                <a href="edit_utilisateur.php?id=<?php echo $user['id_utilisateur']; ?>" 
                                                   class="btn btn-sm btn-primary">
                                                    <i class="fas fa-edit"></i>
                                                </a>
                                                <?php if ($user['id_utilisateur'] != $_SESSION['user']['user_id']): ?>
                                                <a href="delete_utilisateur.php?id=<?php echo $user['id_utilisateur']; ?>" 
                                                   class="btn btn-sm btn-danger" 
                                                   onclick="return confirm('Êtes-vous sûr de vouloir supprimer cet utilisateur ?');">
                                                    <i class="fas fa-trash"></i>
                                                </a>
                                                <?php endif; ?>
                                            </td>
                                        </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

      <?php include_once '../include/footer.php'; ?>
        </div>
    </div>

    <?php include_once '../edit/script.php'; ?>
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
