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
    <title>Sidebar/SINGEEApp</title>
    <style>
        *
        {
            box-sizing: border-box;
            padding: 0;
            margin: 0;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        
        .admin_container
        {
            width: 100%;
            min-height: 100vh;
            display: flex;
            justify-content: flex-end;
            background: #000;
        }
        
        .admin_title_interface
        {
            cursor: pointer;
            width: 20%;
            min-height: 100vh;
            position: fixed;
            left: 0;
            padding: 1.5rem;
            background-color: rgb(123, 0, 0);
            color: white;
        }
        
        .admin_Appname
        {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: flex-start;
            padding-bottom: 3rem;
        }
        
        .admin_Appname h4
        {
            letter-spacing: 0.5rem;
            font-weight: lighter;
            font-style: italic;
        }
        
        .admin_Appname::before
        {
            content: "";
            position: absolute;
            left: 0;
            top: 17%;
            width: 100%;
            height: 0.5px;
            background: rgba(128, 128, 128, 0.568);
        }
        
        .admin_menu_list ul
        { 
            display: flex;
            flex-direction: column;
            /* gap: 1.5rem; */
        }
        
        .admin_menu_list ul li
        {
            padding: 10px;
            list-style: none;
            font-size: large;
        }
        
        .admin_menu_list a
        {
            all: unset;
        }
        
        .admin_menu_list li:active,
        .admin_menu_list li:hover
        {
            width: 100%;
            background: rgba(128, 128, 128, 0.452);
            transition: all 0.3s ease-in-out;
        }
    </style>
</head>
<body>
    <aside class="admin_title_interface">
        <div class="admin_Appname">
            <h2>Administration</h2>
            <h4>SINGEEApp</h4>
        </div>
        <div class="admin_menu_list">
            <div>
                <ul>
                    <li><a href="./admin.php">Tableau de bord</a></li>
                    <li><a href="./comment.php">Commentaires</a></li>
                    <li><a href="./notif.php">Notifications</a></li>
                    <li><a href="./admin.php#table-container">Enregistrements</a></li>
                    <li><a href="#">Paramètres</a></li>
                    <li><a href="./logout_admin.php">Déconnexion</a></li>
                </ul>
            </div>
        </div>
    </aside>
</body>
</html>