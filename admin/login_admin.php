<?php
    
    session_start();

    $error = "" ;
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $nom_admin = $_POST['nom_admin'];
        $password_hash = $_POST['password_admin'];
        $quartier_admin = $_POST['quartier_admin'];
    
        // Connexion à la base de données
        require_once "./db_connexion.php";
        $db->setAttribute(PDO ::ATTR_ERRMODE, PDO ::ERRMODE_EXCEPTION) ;

         // Validation simple
        If (empty($nom_admin) || empty($password_hash) || empty($quartier_admin)) {
            $error = " Veuillez remplir tous les champs c'est obligatoire " ;
        } else {
            // selection de l'admin
            // Nom de l'admin
            $admin = $db->prepare("SELECT * FROM admins ORDER BY Id ASC");
            $admin->execute();

            $NomcompletAdmin = $db->query("SELECT nom_complet FROM admins")->fetchColumn();
            $PasswordAdmin = $db->query("SELECT Password_hash FROM admins")->fetchColumn();
            $QuartierAdmin = $db->query("SELECT quartier FROM admins")->fetchColumn();

            

            if ($nom_admin === $NomcompletAdmin  && $password_hash === $PasswordAdmin && $quartier_admin === $QuartierAdmin) {
                $_SESSION['admin_logged_in'] = true;
                header("Location: admin.php");
                exit();
            } else {
                $error = "Identifiants incorrects";
            }
        
        }
         
    }
?>

<!DOCTYPE html>
<html lang="fr">
<head>
<metacharset="UTF-8">
<metaname="viewport" content="width=device-width, initial-scale=1.0">

<?php
    
    $logoPath = './Logo_App/Burundi_Flag.ico';
    if (file_exists($logoPath)) {
       echo '<link rel="icon" href="'.$logoPath. '" type="image/x-icon">';
       echo '<link rel="shortcut icon" href="'.$logoPath. '" type="image/x-icon">';
    }

?>
<title>SINGEEApp/Connexion Admin</title>
<style>
    :root {
    --primary-color: beige;
    --secondary-color: #2980b9;
    --dark-color: #2c3e50;
    --light-color: #ecf0f1;
    --danger-color: #e74c3c;
    --success-color: #2ecc71;
    --page-background: white;
    }

    body {
        font-family: Arial, sans-serif;
        background-color: #f4f4f9;
        display: flex;
        justify-content: center;
        height: 100vh;
        margin: 0;
        align-items: center;
    }
    
    .login-container {
        background-color: white;
        border-radius: 8px;
        padding: 30px;
        box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
        width: 350px;
    }
    .login-container h2 {
        text-align: center;
        margin-bottom: 20px;
        color: #333;
    }
    .form-group {
        margin-bottom: 20px;
    }
    .form-group label {
        display: block;
        margin-bottom: 8px;
        font-weight: bold;
        color: #555;
    }
    .form-group input {
        width: 100%;
        padding: 10px;
        border: 1px solid #ddd;
        border-radius: 4px;
        font-size: 16px;
        outline: none;
    }
    .submit-btn {
        width: 100%;
        padding: 12px;
        background-color: var(--success-color);
        color: white;
        border: none;
        border-radius: 4px;
        font-size: 16px;
        cursor: pointer;
        transition: background-color 0.3s;
    }
    .submit-btn:hover {
        background-color: #2dec7d;
    }
    .error {
        color: #e74c3c;
        text-align: center;
        margin-bottom: 15px;
    }
    </style>
</head>
<body>

    <?php if ($error) : ?>
        <div class= "message error " style="color: white; width= 100%;background: #e74c3c; padding : 10px; border-radius : 3px;"><?php echo $error ; ?></div>
    <?php endif ; ?>
    <div class="login-container">
        <h2>Connexion Administrateur</h2>
        
        <form method="POST" action="">
            <div class="form-group">
                <label for="nom_admin">Nom complet d'utilisateur</label>
                <input type="text" id="nom_admin" name="nom_admin">
            </div>
                
            <div class="form-group">
                <label for="password_admin">Mot de passe</label>
                <input type="password_admin" id="password_admin" name="password_admin">
            </div>
        
            <div class="form-group">
                <label for="quartier_admin">Quartier</label>
                <input type="text" id="quartier_admin" name="quartier_admin">
            </div>
            <button type="submit" class="submit-btn">Se connecter</button>
        </form>
    </div>
</body>
</html>