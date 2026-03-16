<?php
    session_start();
    // Connexion à la base de données
    $db=new PDO("mysql:host=localhost;dbname=SINGEEAPP","root","");

    // Récupération des prprietes de la table etudiants
    $query = $db->prepare("SELECT * FROM etudiants ORDER BY Registration_date DESC");
    $query->execute();
    $etudiants = $query->fetchAll(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <?php
    
        $logoPath = './Logo_App/Burundi_Flag.ico';
        if (file_exists($logoPath)) {
           echo '<link rel="icon" href="'.$logoPath. '" type="image/x-icon">';
           echo '<link rel="shortcut icon" href="'.$logoPath. '" type="image/x-icon">';
        }

    ?>
    <title>Notification_Admin/SINGEEApp</title>
    <style>
        body{
            width: 100%;
            min-height: 100vh;
            display: flex;
        }

        .notifications{
            width: 80%;
            min-height: 100vh;
            margin-left: 20%;
            background: white;
            padding: 1.5rem;
            color: #000000c1;
            display: flex;
            flex-direction: column;
            /* gap: 1rem; */
        }

        .notification_container
        {
            width: 100%;
            min-height: 100%;
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 1.3rem;
            padding: 2rem 0;
        }

        .notification_title
        {
            padding-bottom: 1.7rem;
        }

        .notification_title h1
        {
            font-size: xx-large;
        }

        .notification_content
        {
            width: 65%;
            display: flex;
            flex-direction: column;
        }
        .notification_items
        {
            width: 100%;
            min-height: 100%;
            border-radius: 10px;
            background-color: #e74c3c;
            padding: 0 1rem;
            color: white;
            display: flex;
            align-items: center;
            justify-content: start;
        }

        .notification_date
        {
            align-self: flex-end;
            font-size: x-small;
        }
    </style>
</head>
<body>
    <section>
        <?php require_once("./sidebar.php") ?>
    </section>
    <section class="notifications">
        <div class="notification_title">
            <h1>Notications</h1>
        </div>
        <hr>
        <div class="notification_container">
            <?php foreach ($etudiants as $etudiant): ?>
                <div class="notification_content">
                    <div class="notification_items">1 nouveau enregistrement vient d'être effectué, il s'agit de <?php echo htmlspecialchars(ucwords($etudiant['Nom'] . ' ' . $etudiant['Post_nom'])); ?>..........</div>
                    <span class="notification_date"><?php echo "Vu le " .  date('d/m/Y H:i:s', strtotime($etudiant['Registration_date'])); ?></span>
                </div>
            <?php endforeach; ?>
        </div>
    </section>
</body>
</html>