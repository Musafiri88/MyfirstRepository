<?php
    //  configuration de l'application
    define('APP_NAME', 'SINGEEE');

    // Démarrer la session
    session_start() ;
    
    // Fonction pour vérifier l"authentification admin
    Function isAdminLoggedIn() {
        Return isset($_SESSION["admin_logged_in"]) && $_SESSION["admin_logged_in"] === true ;
    }
    
    // Fonction pour rediriger si non authentifié
    Function redirectIfNotAdmin() {
        If ( !isAdminLoggedIn()) {
            header(" Location : login_admin.php ") ;
            Exit() ;
        }
    }
?>