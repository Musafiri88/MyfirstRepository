<?php
     session_start();

      $message = "" ;
      $error = "" ;
      // Traitement du formulaire d'enregistrement
      If ($_SERVER["REQUEST_METHOD"] === "POST") {
            $nom = $_POST["nom"] ;
            $postnom = $_POST["postnom"] ;
            $prenom = $_POST["prenom"] ;
            $sexe = $_POST["sexe"] ;
            $etat_civil = $_POST["etat_civil"] ;
            $nation = $_POST["nation"] ;
            $phone = $_POST["phone"] ;
            $email = $_POST["email"] ;
            $passeport_carte_id = $_POST["carte_id"] ;
            $pays_prov = $_POST["pays_prov"] ;
            $quartier = $_POST["quartier"] ;
            $address = $_POST["address"] ;
         
          // Validation simple
          If (empty($nom) || empty($postnom) || empty($prenom) || empty($sexe) || empty($etat_civil) || empty($nation) || empty($email) || empty($phone) || empty($passeport_carte_id) || empty($pays_prov) || empty($address) || empty($quartier)) {
            $error = " Veuillez remplir tous les champs c'est obligatoire " ;
          } else {
            try {
                  $db=new PDO("mysql:host=localhost;dbname=SINGEEAPP","root","");
                  $db->setAttribute(PDO ::ATTR_ERRMODE, PDO ::ERRMODE_EXCEPTION) ;
      
                  // Vérifier si l"email existe déjà
                  $stmt = $db->prepare(" SELECT id FROM etudiants WHERE Email = ?") ;
                  $stmt->execute([$email]) ;
                  // $stmt->execute([$phone]) ;
                  // $stmt->execute([$passeport_carte_id]) ;
      
                  If ($stmt->rowCount() > 0) {
                      $error = " Un étudiant avec cet email existe déjà " ;
                  } else {
                      // Insertion du nouvel étudiant
                        $stmt = $db->prepare(" INSERT INTO etudiants 
                              (Nom,Post_nom,Prenom,Sexe,Etat_civil,Nation,Phone,Email,Passport_Carte_id,Pays_prov,Quartier,Address)
      
                              VALUES ( ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?) ") ;
                              $stmt->execute([
                                $nom,$postnom,$prenom,$sexe,$etat_civil,$nation,$phone,$email,$passeport_carte_id,$pays_prov,$quartier,$address
                              ]) ;
      
                        $message = " Enregistrement réussi ! Votre demande a été effectuée avec succes . " ;
                  }
                  } catch (PDOException $e) {
                      $error = " Erreur technique : "  . $e->getMessage() ;
                  }
            
            } 
      
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
      <title>Enregistrement/SINGEEApp</title>
</head>
<body>
      <?php 
            require_once ("./navbar.php");
      ?>
      <main class="enregistrement_container body_bg_primary">
            <?php if ($message) : ?>
                  <div class= "message success " style="color: white; width= 100%;background: #2ecc71; padding : 10px; border-radius : 3px;"><?php echo $message ; ?></div>
            <?php endif ; ?>
            <?php if ($error) : ?>
                  <div class= "message error " style="color: white; width= 100%;background: #e74c3c; padding : 10px; border-radius : 3px;"><?php echo $error ; ?></div>
            <?php endif ; ?>
            <form action="" method="POST" class="user_form">
                  <legend>Completer toutes les informations necessaires</legend>
                  <div class="input_container">
                        <div>
                              <label for="nom">Nom</label><br>
                              <div class="input_icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" 
                                    stroke="currentColor" class="w-6 h-6"><path stroke-linecap="round" stroke-linejoin="round" 
                                    d="M15.75 6a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0ZM4.501 20.118a7.5 7.5 0 0 1 14.998 
                                    0A17.933 17.933 0 0 1 12 21.75c-2.676 0-5.216-.584-7.499-1.632Z" />
                              </svg>
                                    <input type="text" name="nom" id="nom" placeholder="Votre Nom">
                              </div>
                        </div>
                        <div>
                              <label for="postnom">Nom de famille</label><br>
                              <div class="input_icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" 
                                          stroke="currentColor" class="w-6 h-6"><path stroke-linecap="round" stroke-linejoin="round" 
                                          d="M15.75 6a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0ZM4.501 20.118a7.5 7.5 0 0 1 14.998 
                                          0A17.933 17.933 0 0 1 12 21.75c-2.676 0-5.216-.584-7.499-1.632Z" />
                                    </svg>
                                    <input type="text" name="postnom" id="postnom" placeholder="Votre Post-nom">
                              </div>
                        </div>
                        <div>
                              <label for="prenom">Prenom</label><br>
                              <div class="input_icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" 
                                          stroke="currentColor" class="w-6 h-6"><path stroke-linecap="round" stroke-linejoin="round" 
                                          d="M15.75 6a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0ZM4.501 20.118a7.5 7.5 0 0 1 14.998 
                                          0A17.933 17.933 0 0 1 12 21.75c-2.676 0-5.216-.584-7.499-1.632Z" />
                                    </svg>
                                    <input type="text" name="prenom" id="prenom" placeholder="Votre Prenom">
                              </div>
                        </div>
                        <div>
                              <label for="sexe">Sexe</label><br>
                              <div class="input_icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" 
                                          class="w-6 h-6"><path stroke-linecap="round" stroke-linejoin="round" d="M17.982 18.725A7.488 7.488 0 0 0 12 15.75a7.488 
                                          7.488 0 0 0-5.982 2.975m11.963 0a9 9 0 1 0-11.963 0m11.963 0A8.966 8.966 0 0 1 12 21a8.966 8.966 0 0 1-5.982-2.275M15 
                                          9.75a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                                    </svg>

                                    <select name="sexe" id="sexe">
                                          <option value="M">Masculin</option>
                                          <option value="F">Feminin</option>
                                          <option value="autres">Autres</option>
                                    </select>
                              </div>
                        </div>
                        <div>
                              <label for="etat_civil">Etat civil</label><br>
                              <div class="input_icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" 
                                          stroke="currentColor" class="w-6 h-6"><path stroke-linecap="round" stroke-linejoin="round" 
                                          d="M18 18.72a9.094 9.094 0 0 0 3.741-.479 3 3 0 0 0-4.682-2.72m.94 3.198.001.031c0 .225-.012.447-.037.666A11.944 
                                          11.944 0 0 1 12 21c-2.17 0-4.207-.576-5.963-1.584A6.062 6.062 0 0 1 6 18.719m12 0a5.971 5.971 0 0 0-.941-3.197m0 
                                          0A5.995 5.995 0 0 0 12 12.75a5.995 5.995 0 0 0-5.058 2.772m0 0a3 3 0 0 0-4.681 2.72 8.986 8.986 0 0 0 
                                          3.74.477m.94-3.197a5.971 5.971 0 0 0-.94 3.197M15 6.75a3 3 0 1 1-6 0 3 3 0 0 1 6 0Zm6 3a2.25 2.25 0 1 
                                          1-4.5 0 2.25 2.25 0 0 1 4.5 0Zm-13.5 0a2.25 2.25 0 1 1-4.5 0 2.25 2.25 0 0 1 4.5 0Z" />
                                    </svg>
                                    <select name="etat_civil" id="etat_civil">
                                          <option value="Célibataire">Célibataire</option>
                                          <option value="Marié(e)">Marié(e)</option>
                                          <option value="Autres">Autres</option>
                                    </select>
                              </div>
                        </div>
                        <div>
                              <label for="nation">Nationalité</label><br>
                              <div class="input_icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" 
                                          class="w-6 h-6"><path stroke-linecap="round" stroke-linejoin="round" d="m20.893 13.393-1.135-1.135a2.252 2.252 0 0 
                                          1-.421-.585l-1.08-2.16a.414.414 0 0 0-.663-.107.827.827 0 0 1-.812.21l-1.273-.363a.89.89 0 0 0-.738 1.595l.587.39c.59.395.674 
                                          1.23.172 1.732l-.2.2c-.212.212-.33.498-.33.796v.41c0 .409-.11.809-.32 1.158l-1.315 2.191a2.11 2.11 0 0 1-1.81 1.025 
                                          1.055 1.055 0 0 1-1.055-1.055v-1.172c0-.92-.56-1.747-1.414-2.089l-.655-.261a2.25 2.25 0 0 1-1.383-2.46l.007-.042a2.25 
                                          2.25 0 0 1 .29-.787l.09-.15a2.25 2.25 0 0 1 2.37-1.048l1.178.236a1.125 1.125 0 0 0 1.302-.795l.208-.73a1.125 1.125 0 
                                          0 0-.578-1.315l-.665-.332-.091.091a2.25 2.25 0 0 1-1.591.659h-.18c-.249 0-.487.1-.662.274a.931.931 0 0 1-1.458-1.137l1.411-2.353a2.25 
                                          2.25 0 0 0 .286-.76m11.928 9.869A9 9 0 0 0 8.965 3.525m11.928 9.868A9 9 0 1 1 8.965 3.525" />
                                    </svg>
                                    <input type="text" name="nation" id="nation" placeholder="Exemple : Congolaise">
                              </div>
                        </div>
                        <div>
                              <label for="phone">Numéro de télépone</label><br>
                              <div class="input_icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" 
                                          stroke="currentColor" class="w-6 h-6"><path stroke-linecap="round" stroke-linejoin="round" d="M2.25 6.75c0 8.284 6.716 15 15 
                                          15h2.25a2.25 2.25 0 0 0 2.25-2.25v-1.372c0-.516-.351-.966-.852-1.091l-4.423-1.106c-.44-.11-.902.055-1.173.417l-.97 
                                          1.293c-.282.376-.769.542-1.21.38a12.035 12.035 0 0 1-7.143-7.143c-.162-.441.004-.928.38-1.21l1.293-.97c.363-.271.527-.734.417-1.173L6.963 
                                          3.102a1.125 1.125 0 0 0-1.091-.852H4.5A2.25 2.25 0 0 0 2.25 4.5v2.25Z" />
                                    </svg>
                                    <input type="tel" name="phone" id="phone" placeholder="Exemple : +257 68 42 89 02">
                              </div>
                        </div>
                        <div>
                              <label for="email">Adresse E-mail</label><br>
                              <div class="input_icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" 
                                          class="w-6 h-6"><path stroke-linecap="round" stroke-linejoin="round" d="M21.75 6.75v10.5a2.25 2.25 0 0 1-2.25 
                                          2.25h-15a2.25 2.25 0 0 1-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0 0 19.5 4.5h-15a2.25 2.25 0 0 0-2.25 2.25m19.5 
                                          0v.243a2.25 2.25 0 0 1-1.07 1.916l-7.5 4.615a2.25 2.25 0 0 1-2.36 0L3.32 8.91a2.25 2.25 0 0 1-1.07-1.916V6.75" />
                                    </svg>
                                    <input type="email" name="email" id="email" placeholder="Exemple : jmi@gmail.com">
                              </div>
                        </div>
                        <div>
                              <label for="carte_id">N° de Carte d'identité/Passeport</label><br>
                              <div class="input_icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                          <path stroke-linecap="round" stroke-linejoin="round" d="M15 9h3.75M15 12h3.75M15 15h3.75M4.5 19.5h15a2.25 2.25 0 0 0 
                                          2.25-2.25V6.75A2.25 2.25 0 0 0 19.5 4.5h-15a2.25 2.25 0 0 0-2.25 2.25v10.5A2.25 2.25 0 0 0 4.5 19.5Zm6-10.125a1.875 1.875 
                                          0 1 1-3.75 0 1.875 1.875 0 0 1 3.75 0Zm1.294 6.336a6.721 6.721 0 0 1-3.17.789 6.721 6.721 0 0 1-3.168-.789 3.376 3.376 0 0 1 
                                          6.338 0Z" />
                                    </svg>
                                    <input type="text" name="carte_id" id="carte_id" placeholder="Exemple : 33324240xxxxxxxx">
                              </div>
                        </div>      
                        <div>
                              <label for="pays_prov">Pays de provénance</label><br>
                              <div class="input_icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                          <path stroke-linecap="round" stroke-linejoin="round" d="M3 3v1.5M3 21v-6m0 0 2.77-.693a9 
                                          9 0 0 1 6.208.682l.108.054a9 9 0 0 0 6.086.71l3.114-.732a48.524 48.524 0 0 1-.005-10.499l-3.11.732a9 9 0 0 
                                          1-6.085-.711l-.108-.054a9 9 0 0 0-6.208-.682L3 4.5M3 15V4.5" />
                                    </svg>
                                    <select name="pays_prov" id="pays_prov">
                                          <option value="Burundi">Burundi</option>
                                          <option value="RD Congo">RD Congo</option>
                                          <option value="Tanzanie">Tanzanie</option>
                                          <option value="Rwanda">Rwanda</option>
                                          <option value="Cameroun">Cameroun</option>
                                          <option value="Cote d'Ivoire">Cote d'Ivoire</option> 
                                    </select>
                              </div>
                              
                        </div>
                        <div>
                              <label for="quartier">Adresse de résidence(Quartier)</label><br>
                              <div class="input_icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                          <path stroke-linecap="round" stroke-linejoin="round" d="m2.25 12 8.954-8.955c.44-.439 1.152-.439 
                                          1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 
                                          1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h8.25" />
                                    </svg>
                                    <select name="quartier" id="quartier">
                                          <option value="bukirasaze">Bukirasaze</option>
                                          <option value="buterere">Buterere</option>                                         
                                          <option value="buyenzi">Buyenzi</option>
                                          <option value="carama">Carama</option>
                                          <option value="cibitoke">Cibitoke</option>
                                          <option value="kamenge">Kamenge</option>
                                          <option value="kigobe">Kigobe</option> 
                                          <option value="kinama">Kinama</option>
                                          <option value="mtakura">Mtakura</option>
                                          <option value="ngagara">Ngagara</option>
                                          <option value="nyakabiga">Nyakabiga</option>
                                    </select>
                              </div>

                        </div>
                        <div>
                              <label for="address">Autres adresses de résidence</label><br>
                              <div class="input_icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                          <path stroke-linecap="round" stroke-linejoin="round" d="m2.25 12 8.954-8.955c.44-.439 1.152-.439 
                                          1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 
                                          1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h8.25" />
                                    </svg>
                                    <input type="text" name="address" id="address" placeholder="15eme avenue/14">
                              </div>
                        </div>
                  </div>
                  
                  <div class="enregistrement_btn">
                        <button type="submit">S'enregistrer</button>
                  </div>
            </form>


           
            <?php 
                  require_once ("./footer.php");
            ?>
      </main>
</body>
</html>