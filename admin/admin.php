<?php
    session_start();
    // Vérification de l'authentification de l'administrateur
    if (!isset($_SESSION['admin_logged_in'])) {
        header("Location: login_admin.php");
        exit();
    }
    
    // Connexion à la base de données
    require_once "./db_connexion.php";
    
    // Récupération des étudiants
    // if (isset($_GET['tbnm'])) {
    //     $tbnm = $_GET['id'];
    //     $delete = $db->query("DELETE FROM etudiants WHERE Id = $id");
    //     header("Location:admin.php");
    // }
    $query = $db->prepare("SELECT * FROM etudiants ORDER BY Nom ASC");
    $query->execute();
    $etudiants = $query->fetchAll(PDO::FETCH_ASSOC);
    
    // Initialisation de numerotation de la liste du tableau Admin
    $id = 1;
    // Statistiques
    $totalStudents = $db->query("SELECT COUNT(*) FROM etudiants")->fetchColumn();
    $studentsThisMonth = $db->query("SELECT COUNT(*) FROM etudiants WHERE MONTH(Registration_date) = MONTH(CURRENT_DATE())")->fetchColumn();
    $studentsToDay = $db->query("SELECT COUNT(*) FROM etudiants WHERE DAY(Registration_date) = DAY(CURRENT_DATE())")->fetchColumn();
    
    // Notifications
    $totalNomsEtudiants = $db->query("SELECT COUNT(Id) FROM etudiants")->fetchColumn();
    If ($totalNomsEtudiants > 9) {
        $totalNomsEtudiants = "+9" ;
    } 

    // commentaires
    $stmt = $db->prepare("SELECT * FROM commentaires ORDER BY Id ASC");
    $stmt->execute();
    $totalcomments = $db->query("SELECT COUNT(Id) FROM commentaires")->fetchColumn();
    If ($stmt > 9) {
        $stmt = "+9" ;
    } 

    // Nom de l'admin
    $admin = $db->prepare("SELECT * FROM admins ORDER BY Id ASC");
    $admin->execute();
    $NomcompletAdmin = $db->query("SELECT nom_complet FROM admins")->fetchColumn();

    // Barre de recherche
    $search = isset($_POST['search']) ? $_POST['search'] : '';
    $error = "";

    if ($search) {
        $s = $db->prepare("SELECT * 
            FROM etudiants 
            WHERE Id LIKE :search
                OR Nom  LIKE :search
                OR Post_nom LIKE :search
                OR Prenom LIKE :search
                OR Sexe LIKE :search
                OR Etat_civil LIKE :search
                OR Nation LIKE :search
                OR Phone LIKE :search
                OR Email LIKE :search
                OR Passport_Carte_id LIKE :search
                OR Pays_prov LIKE :search
                OR Quartier LIKE :search
                OR Address LIKE :search
            ");
        $s->execute([':search' => "%$search%"]);
        $etudiants = $s->fetchAll();
    }else {
       $etudiants = $db->query("SELECT * FROM etudiants")->fetchAll(); 
    }
    
    // $error_verify = [': search' => "%$error%"];
    // if($error_verify) {
    //     $error = " Aucun étudiant n'est entregistré avec cette donnée " ;
    //     // $etudiants = $db->query("SELECT * FROM etudiants")->fetchAll();
    // }

    // Supprimer_btn
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $delete = $db->query("DELETE FROM etudiants WHERE Id = $id");
        header("Location:admin.php");
    }
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <meta http-equiv="refresh" content="1"> -->

    <link rel="stylesheet" href="./admin.css">
    <?php
        header("refresh:30");

        $logoPath = './Logo_App/Burundi_Flag.ico';
        if (file_exists($logoPath)) {
           echo '<link rel="icon" href="'.$logoPath. '" type="image/x-icon">';
           echo '<link rel="shortcut icon" href="'.$logoPath. '" type="image/x-icon">';
        }

    ?>
    <script src="./admin.js"></script>
    <title>Admin/SINGEEApp</title>
</head>
<body>
    <main class="admin_container">
        <?php require_once("./sidebar.php") ?>
        <section class="admin_show_interface">
            <div class="tableau_de_bord" id="tableau_de_bord_id">
                <div class="tableau_de_bord_title">
                    <h1>Tableau de bord</h1>
                    <div class="admin_notif_sms_icons">
                        <p>Bienvenue <?php echo $NomcompletAdmin; ?></p>
                        <div class="notif_sms_icons">
                            <a href="./notif.php" class="notif_link">
                                <span>
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" strokeWidth={1.5} stroke="currentColor" 
                                        className="w-6 h-6"><path strokeLinecap="round" strokeLinejoin="round" d="M14.857 17.082a23.848 23.848 0 0 0 
                                        5.454-1.31A8.967 8.967 0 0 1 18 9.75V9A6 6 0 0 0 6 9v.75a8.967 8.967 0 0 1-2.312 6.022c1.733.64 3.56 1.085 
                                        5.455 1.31m5.714 0a24.255 24.255 0 0 1-5.714 0m5.714 0a3 3 0 1 1-5.714 0" />
                                    </svg>
                                    <span class="notif_count"><?php echo $totalNomsEtudiants; ?></span>
                                </span>
                            </a>
                            <a href="./comment.php" class="sms_link">
                                <span>
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" 
                                        class="w-6 h-6"><path stroke-linecap="round" stroke-linejoin="round" d="M2.25 12.76c0 1.6 1.123 2.994 2.707 
                                        3.227 1.068.157 2.148.279 3.238.364.466.037.893.281 1.153.671L12 21l2.652-3.978c.26-.39.687-.634 1.153-.67 
                                        1.09-.086 2.17-.208 3.238-.365 1.584-.233 2.707-1.626 2.707-3.228V6.741c0-1.602-1.123-2.995-2.707-3.228A48.394 
                                        48.394 0 0 0 12 3c-2.392 0-4.744.175-7.043.513C3.373 3.746 2.25 5.14 2.25 6.741v6.018Z" />
                                    </svg>
                                    <span class="sms_count"><?php echo $totalcomments; ?></span>
                                </span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <hr>
            <!-- Statistics Cards -->
            <div class="stats-container">
                <div class="stat-card primary">
                    <h3>Etudiants enregistrés</h3>
                    <p><?php echo $totalStudents; ?></p>
                </div>
            
                <div class="stat-card success">
                    <h3>Ce mois-ci</h3>
                    <p><?php echo $studentsThisMonth; ?></p>
                </div>
            
                <div class="stat-card danger">
                    <h3>Par jour : Aujourd'hui <span style="color: rgba(199, 2, 2, 0.701);">(<?php date_default_timezone_set('Africa/Lubumbashi'); echo date('d/m/Y H:i:s'); ?>)</span></h3>
                    <p><?php echo $studentsToDay; ?></p>
                </div>
            </div>
            
            <!-- Search and Filter -->
            <div class="search_filter_contain">

                <form action="" method="post">
                    <div class="search-filter">
                       <input type="search" name="search" value="<?= htmlspecialchars($search); ?>" class="search-box" placeholder="Rechercher un étudiant..." id="searchInput">
                       <button type="submit" class="btn_search">Rechercher</button>
                    </div>
                </form>
                <div class="tri_container">
                    <select name="tri" id="triage" class="triage">
                        <a href="./comment.php">
                            <option value="">Trier par</option>
                        <option value="tri_by_name">Noms</option>
                        <option value="tri_by_recentsAdds">Ajouts Recents</option>
                        <option value="tri_by_quaters">Quartiers</option>
                        <option value="tri_by_origins">Pays d'origine</option>
                        <option value="tri_by_sex">Sexe</option>
                        <option value="tri_by_civil">Etat civil</option>
                        <option value="tri_by_nations">Nationalité</option>
                        </a>
                        
                    </select>
                </div>

            </div>
            <div class="table-container" id="table-container">
                <table id="studentsTable">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nom complet</th>
                            <th>Sexe</th>
                            <th>Etat civil</th>
                            <th>Nationalité</th>
                            <th>E-mail</th>
                            <th>Téléphone</th>
                            <th>Passport/Carte d'identité</th>
                            <th>Pays de provénance</th>
                            <th>Adresse</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- <?php if ($error_verify) : ?>
                            <div class= "message error " style="color: white; width= 100%;background: #e74c3c; padding : 10px; border-radius : 3px;"><?php echo $error ; ?></div>
                        <?php endif ; ?> -->
                        <?php foreach ($etudiants as $etudiant): ?> 
                            <tr>
                                <td><?php echo $id++; ?></td>
                                <td style="text-transform: capitalize;"><?php echo htmlspecialchars($etudiant['Nom'] . ' ' . $etudiant['Post_nom'] . ' ' . $etudiant['Prenom']); ?></td>
                                <td><?php echo htmlspecialchars($etudiant['Sexe']); ?></td>
                                <td style="text-transform: capitalize;"><?php echo htmlspecialchars($etudiant['Etat_civil']); ?></td>
                                <td style="text-transform: capitalize;"><?php echo htmlspecialchars($etudiant['Nation']); ?></td>
                                <td><?php echo htmlspecialchars($etudiant['Email']); ?></td>
                                <td><?php echo $etudiant['Phone']; ?></td>
                                <td><?php echo htmlspecialchars($etudiant['Passport_carte_id']); ?></td>
                                <td style="text-transform: capitalize;"><?php echo htmlspecialchars($etudiant['Pays_prov']); ?></td>
                                <td style="text-transform: capitalize;"><?php echo htmlspecialchars($etudiant['Quartier'] . '/' . $etudiant['Address']); ?></td>
                                <td id="action-btn">
                                    <a href="./update.php?id=<?= $etudiant["Id"] ?>" class="action-btn edit-btn">
                                        Modifier
                                    </a>
                                    <a href="./admin.php?id=<?= $etudiant["Id"] ?>" name="delete_btn" class="action-btn delete-btn"
                                           onclick="return confirm('Etes-vous sur de vouloir supprimer ?')">
                                        Supprimer
                                    </a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </section>

    </main>
</body>
</html>