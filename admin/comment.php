<?php
    session_start();
    // Connexion à la base de données
    require_once "./db_connexion.php";
    
    // Récupération des prprietes de la table etudiants
    $query = $db->prepare("SELECT * FROM commentaires ORDER BY Registration_date DESC");
    $query->execute();
    $comments = $query->fetchAll(PDO::FETCH_ASSOC);
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
    <title>commentaires_Admin/SINGEEApp</title>
    <style>
        body{
            width: 100%;
            min-height: 100vh;
            display: flex;
        }

        .comments{
            width: 80%;
            min-height: 100vh;
            margin-left: 20%;
            background: white;
            padding: 1.5rem;
            color: #000000c1;
            display: flex;
            flex-direction: column;
        }

        .comment_container
        {
            width: 100%;
            min-height: 100%;
            display: flex;
            align-items: center;
            flex-direction: column;
            gap: 1.3rem;
            padding: 2rem 0;
        }

        .comment_title h1
        {
            font-size: xx-large;
        }

        .comment_title
        {
            padding-bottom: 1.7rem;
        }

        .comment_content
        {
            width: 60%;
            display: flex;
            flex-direction: column;
        }
        .comment_items
        {
            width: 100%;
            min-height: 100%;
            border-radius: 10px;
            background-color: #e74c3c;
            padding: 0 1rem;
            color: white;
            display: flex;
            align-items: center;
        }

        .comment_date
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
    <section class="comments">
        <div class="comment_title">
            <h1>Commentaires</h1>
        </div>
        <hr>
        <div class="comment_container">
            <?php foreach ($comments as $comment): ?>
                <div class="comment_content">
                    <div class="comment_items"><?php echo htmlspecialchars(ucfirst(strtolower($comment['commentaires_content']))); ?></div>
                    <span class="comment_date"><?php echo "Vu le " .  date('d/m/Y H:i:s', strtotime($comment['Registration_date'])); ?></span>
                </div>
            <?php endforeach; ?>
        </div>
    </section>
</body>
</html>