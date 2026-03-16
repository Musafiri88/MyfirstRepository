<?php
    session_start();
    // Traitement du textearea des commentaires
      If ($_SERVER["REQUEST_METHOD"] === "POST") {
          $comments = $_POST["commentaires"] ;
      }     
       
        // Validation du textearea des commentaires
      if (!empty($comments) ) {
            // Connexion à la base de données
            $db=new PDO("mysql:host=localhost;dbname=SINGEEAPP","root","");
            $db->setAttribute(PDO ::ATTR_ERRMODE, PDO ::ERRMODE_EXCEPTION) ;

            // Insertion du nouveau commentaire
            $stmt =$db->prepare(" INSERT INTO commentaires
                  (commentaires_content) VALUES (?) ") ;
            $stmt->execute([$comments]);

      }

?>

<!DOCTYPE html>
<html lang="en">
<head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">

      <link rel="stylesheet" href="./style1.css">
      <script src="./js.js" defer></script>
      <?php
    
        $logoPath = './Logo_App/Burundi_Flag.ico';
        if (file_exists($logoPath)) {
           echo '<link rel="icon" href="'.$logoPath. '" type="image/x-icon">';
           echo '<link rel="shortcut icon" href="'.$logoPath. '" type="image/x-icon">';
        }

      ?>
      <title>Apropos/SINGEEApp</title>
</head>
<body>
      <?php 
            require_once ("./navbar.php");
      ?>
      <main class="apropos_container body_bg_primary">
            <section>
                  <h3>Qui sommes-nous ?</h3>
                  <p>Nous sommes un système informatique <span class="App_name">SINGEE</span> (Système d'Information de Gestion des Etudiants Etrangers) résidant au Burundi aidant ainsi aux étudiants étrangers vivants au Burundi 
                     d'être enregistrer et d'être au moins connus au niveau national par des pièces d'identités qu'ils possèdent. 
                  </p>
            </section>

            <section class="section_commentaires_textarea">
                  <div>
                        <h3>Commentaire</h3>
                        <p>Si vous avez des commentaires apropos du système n'hésitez pas, veuillez nous signalez ici en bas <a href="#commentaires" class="commenteires_link"><span>&darr;</span></a></p>
                  </div>
                  <form action="" method="POST">
                        <div class="commentaires_textarea">
                              <textarea name="commentaires" id="commentaires"  class="commentaires" cols="50" rows="10" placeholder="Veuillez noter vos commentaires ici"></textarea>
                        </div>
                        <div>
                              <button type="submit" class="send_comment_btn">Envoyer</button>
                        </div>
                  </form>
                 
            </section>
      </main>
</body>
</html>

<?php 
      require_once ("./footer.php");
?>