<?php
    $db=new PDO("mysql:host=localhost;dbname=SINGEEAPP","root","");

    // update
    if (isset($_GET['id'])) {
        $id = $_GET['id'];

        $selects = $db->query("SELECT * FROM etudiants WHERE Id = $id");

        $select=$selects->fetch(PDO::FETCH_ASSOC);

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
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

            $update = $db->prepare("UPDATE etudiants SET Nom = ?,Post_nom = ?,Prenom = ?,Sexe = ?,Etat_civil = ?,
                      Nation = ?,Phone = ?,Email = ?,Passport_carte_id = ?,Pays_prov = ?,Quartier = ?,Address = ? 
                      WHERE Id = ?");
            $update->execute([$nom,$postnom,$prenom,$sexe,$etat_civil,
            $nation,$phone,$email,$passeport_carte_id,$pays_prov,$quartier,$address,$id]);

            header("Location:admin.php");
        }
        
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <?php
    
        $logoPath = './Logo_App/Burundi_Flag.ico';
        if (file_exists($logoPath)) {
           echo '<link rel="icon" href="'.$logoPath. '" type="image/x-icon">';
           echo '<link rel="shortcut icon" href="'.$logoPath. '" type="image/x-icon">';
        }

    ?>
    <style>
        *
        {
            box-sizing: border-box;
            padding: 0;
            margin: 0;
        }
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
            align-items: center;
            padding: 1.5rem;
        }
        
        .update-container {
            width: 100%;
            min-height: 100vh;
            /* padding: 30px; */
        }

        .modif_form
        {
            width: 100%;
            min-height: 100%;
            background-color: var(--page-background);
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            padding: 2rem;
            display: flex;
            flex-direction: column;
            gap: 1.5rem;
        }

        .modif_form h2 {
            text-align: center;
            color: #333;
            font-weight: 450;
        }

        .input_container
        {
            display: flex;
            gap: 2rem;
        }

        .input_group label {
            /* display: block; */
            font-weight: bold;
            color: #555;
        }

        .input_group input {
            width: 20rem;
            padding: 7px;
            border: 1px solid #ddd;
            border-radius: 4px;
            font-size: 16px;
            outline: none;
        }

        .input_group select
        {
            width: 60%;
            cursor: pointer;
            padding: 7px;
            border: 1px solid #ddd;
            border-radius: 4px;
            font-size: 16px;
            outline: none;
        }

        .left_inputs,
        .right_inputs
        {
            display: flex;
            flex-direction: column;
            gap: 1rem;
        }

        .modif_btn {
            width: 60%;
            padding: 12px;
            align-self: center;
            background-color: var(--success-color);
            color: white;
            border: none;
            border-radius: 4px;
            font-size: 1.1em;
            letter-spacing: 2px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .modif_btn:hover {
            background-color:rgb(39, 177, 96);
        }

    </style>
</head>
<body>

    <div class="update_container">

        <form action="" method="POST" class="modif_form">

            <h2>Modifier les informations de l'étudiant(e)</h2>

            <div class="input_container">

                <div class="left_inputs">

                    <div class="input_group">
                        <label for="nom">Nom</label><br>
                        <input type="text" name="nom" value="<?= $select['Nom'] ?>">
                    </div>

                    <div class="input_group">
                        <label for="postnom">Nom de famille</label><br>
                        <input type="text" name="postnom" value="<?= $select['Post_nom'] ?>">
                    </div>

                    <div class="input_group">
                        <label for="prenom">Prenom</label><br>
                        <input type="text" name="prenom" value="<?= $select['Prenom'] ?>">
                    </div>

                    <div class="input_group">
                        <!-- <label for="sexe">Sexe</label> -->
                        <select name="sexe" id="sexe">
                            <option value="<?= $select['Sexe'] ?>">Sexe</option>
                            <option value="M">Masculin</option>
                            <option value="F">Feminin</option>
                            <option value="autres">Autres</option>
                        </select>
                    </div>

                    <div class="input_group">
                        <!-- <label for="etat_civil">Etat civil</label> -->
                        <select name="etat_civil" id="etat_civil">
                            <option value="<?= $select['Etat_civil'] ?>">Etat civil</option>
                            <option value="Célibataire">Célibataire</option>
                            <option value="Marié(e)">Marié(e)</option>
                            <option value="Autres">Autres</option>
                        </select>
                    </div>

                    <div class="input_group">
                        <label for="nation">Nationalité</label><br>
                        <input type="text" name="nation" value="<?= $select['Nation'] ?>">
                    </div>

                </div>
                
                <div class="right_inputs">

                    <div class="input_group">
                        <label for="phone">Numéro de télépone</label><br>
                        <input type="tel" name="phone" value="<?= $select['Phone'] ?>">
                    </div>

                    <div class="input_group">
                        <label for="email">Adresse E-mail</label><br>
                        <input type="email" name="email" value="<?= $select['Email'] ?>">
                    </div>

                    <div class="input_group">
                        <label for="carte_id">N° de Carte d'identité/Passeport</label><br>
                        <input type="text" name="carte_id" value="<?= $select['Passport_carte_id'] ?>">
                    </div> 

                    <div class="input_group">
                        <select name="pays_prov" id="pays_prov">
                            <option value="<?= $select['Pays_prov'] ?>">Pays de provénance</option>
                            <option value="burundi">Burundi</option>
                            <option value="rdc">RD Congo</option>
                            <option value="tanzanie">Tanzanie</option>
                            <option value="rwanda">Rwanda</option>
                            <option value="cameroun">Cameroun</option>
                            <option value="C.ivoire">Cote d'Ivoire</option> 
                        </select>
                    </div>

                    <div class="input_group">
                        <select name="quartier" id="quartier">
                            <option value="<?= $select['Quartier'] ?>">Quartier</option>
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

                    <div class="input_group">
                        <label for="address">Autres adresses de résidence</label><br>
                        <input type="text" name="address" value="<?= $select['Address'] ?>">
                    </div>

                </div>

            </div>

            <button type="submit" class="modif_btn">Modifier</button>

        </form>

    </div>
    
</body>
</html>