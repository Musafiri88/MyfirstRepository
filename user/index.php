<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="./style.css">
    <script src="./js.js" defer></script>
    <?php
    
        $logoPath = './Logo_App/Burundi_Flag.ico';
        if (file_exists($logoPath)) {
           echo '<link rel="icon" href="'.$logoPath. '" type="image/x-icon">';
           echo '<link rel="shortcut icon" href="'.$logoPath. '" type="image/x-icon">';
        }

    ?>
    <title>SINGEEApp</title>
</head>
<body>
     
    <?php 
        require_once ("./navbar.php");
    ?>
    <!-- SECTION_WELCOME_AND_ABOUT_SYSTEM -->
    <main>

        <section class="accueil_container body_bg_primary">
            <h2>Bienvenue au Système d'Information de Gestion des Etudiants Etrangers (SINGEE)</h2>
            <p class="about_para_1">
                <span>Comment accéder aux éxigences du système et de l'application ?</span>
            </p>
            <div class="about_set">
                <div class="about_set_text">
                    <div>
                        <h4>S'enregistrer</h4>
                        <p>Veuillez vous enregistrer selon vos quartiers en entrant vos identifiants demandés par notre système.</p>
                    </div>
                    <div>
                        <h4>Vérification de l'enregistrement</h4>
                        <p>Veuillez vous rassurer de votre enregistrement en visitant notre système
                            et s'enregistrer q'une seule fois dans notre système.   
                        </p>
                    </div>
                    
                </div>
    
                <div>
                    <img src="./images/bg4.jpg" alt="student picture" width="400" height="200">
                </div>
            </div>
        </section>

    </main>
    <?php 
        require_once ("./footer.php");
    ?>

</body>
</html>