<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="./navbar.css">
    <script src="./js.js" defer></script>
    <?php
    
        $logoPath = './Logo_App/Burundi_Flag.ico';
        if (file_exists($logoPath)) {
           echo '<link rel="icon" href="'.$logoPath. '" type="image/x-icon">';
           echo '<link rel="shortcut icon" href="'.$logoPath. '" type="image/x-icon">';
        }

    ?>
    <!-- <script src="./mode.js" defer></script> -->
    <title>Navbar/SINGEEApp</title>
</head>
<body>
    <!-------------------------------- HEADER_L'ENTETE DE LA PAGE ---------------------------------------------------->
    <header class="header_scroll">
        <!--......................................... NAV_BAR & MENU ------------------------------------------------->
        <nav>
            <!------------------ MENU_ICON ---------------------------->
            <div class="nav_menu">
                <!-- MENU_SVG -->
                <span class="menu_icon">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" strokeWidth={1.5} 
                        stroke="currentColor" className="w-6 h-6"><path strokeLinecap="round" strokeLinejoin="round" 
                        d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                    </svg>
                </span>

                <div class="menu_list">
                    <!-- <h4 class="parametre_title_icon seting_hover">
                        <span>
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" 
                                stroke="currentColor" class="w-6 h-6"><path stroke-linecap="round" stroke-linejoin="round" 
                                d="M10.343 3.94c.09-.542.56-.94 1.11-.94h1.093c.55 0 1.02.398 1.11.94l.149.894c.07.424.384.764.78.93.398.164.855.142 
                                1.205-.108l.737-.527a1.125 1.125 0 0 1 1.45.12l.773.774c.39.389.44 1.002.12 1.45l-.527.737c-.25.35-.272.806-.107 
                                1.204.165.397.505.71.93.78l.893.15c.543.09.94.559.94 1.109v1.094c0 .55-.397 1.02-.94 1.11l-.894.149c-.424.07-.764.383-.929.78-.165.398-.143.854.107 1.204l.527.738c.32.447.269 1.06-.12 1.45l-.774.773a1.125 1.125 0 0 1-1.449.12l-.738-.527c-.35-.25-.806-.272-1.203-.107-.398.165-.71.505-.781.929l-.149.894c-.09.542-.56.94-1.11.94h-1.094c-.55 0-1.019-.398-1.11-.94l-.148-.894c-.071-.424-.384-.764-.781-.93-.398-.164-.854-.142-1.204.108l-.738.527c-.447.32-1.06.269-1.45-.12l-.773-.774a1.125 1.125 0 0 1-.12-1.45l.527-.737c.25-.35.272-.806.108-1.204-.165-.397-.506-.71-.93-.78l-.894-.15c-.542-.09-.94-.56-.94-1.109v-1.094c0-.55.398-1.02.94-1.11l.894-.149c.424-.07.765-.383.93-.78.165-.398.143-.854-.108-1.204l-.526-.738a1.125 1.125 
                                0 0 1 .12-1.45l.773-.773a1.125 1.125 0 0 1 1.45-.12l.737.527c.35.25.807.272 1.204.107.397-.165.71-.505.78-.929l.15-.894Z" /> 
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                            </svg>

                        </span>
                        <div class="parametre_title">
                            <span>Paramètres</span>
                        </div>    
                    </h4>
                    
                    <div class="parametre_lists">
                        <ul class="parametre_list">
                            <li class="langue_param">
                                <span class="seting_hover">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" 
                                        stroke="currentColor" class="w-6 h-6"><path stroke-linecap="round" stroke-linejoin="round" 
                                        d="M12 21a9.004 9.004 0 0 0 8.716-6.747M12 21a9.004 9.004 0 0 1-8.716-6.747M12 21c2.485 
                                        0 4.5-4.03 4.5-9S14.485 3 12 3m0 18c-2.485 0-4.5-4.03-4.5-9S9.515 3 12 3m0 0a8.997 8.997 0 
                                        0 1 7.843 4.582M12 3a8.997 8.997 0 0 0-7.843 4.582m15.686 0A11.953 11.953 0 0 1 12 10.5c-2.998 
                                        0-5.74-1.1-7.843-2.918m15.686 0A8.959 8.959 0 0 1 21 12c0 .778-.099 1.533-.284 2.253m0 0A17.919 
                                        17.919 0 0 1 12 16.5c-3.162 0-6.133-.815-8.716-2.247m0 0A9.015 9.015 0 0 1 3 12c0-1.605.42-3.113 
                                        1.157-4.418" />
                                    </svg>Langue  
                                </span>
                                <ul class="langue_list">
                                    <li class="seting_hover">Français(FR)</li>
                                    <li class="seting_hover">Anglais(UK)</li>
                                </ul>
                            </li>
    
                            <li class="mode_claire_sombre">
                                <div class="mode_claire_btn seting_hover">
                                    <div class="mode_claire">
                                        <span>
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" strokeWidth={1.5} 
                                                stroke="currentColor" className="w-6 h-6"><path strokeLinecap="round" strokeLinejoin="round" 
                                                d="M12 3v2.25m6.364.386-1.591 1.591M21 12h-2.25m-.386 6.364-1.591-1.591M12 18.75V21m-4.773-4.227-1.591 
                                                1.591M5.25 12H3m4.227-4.773L5.636 5.636M15.75 12a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0Z" />
                                            </svg>
                                        </span>Mode Claire
                                    </div>
                                    <button class="mode_btn">
                                        <button class="btn_circle"></button>
                                    </button>
                                </div>
    
                                <div class="mode_sombre">
                                    <span>
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" strokeWidth={1.5} 
                                            stroke="currentColor" className="w-6 h-6"><path strokeLinecap="round" strokeLinejoin="round" 
                                            d="M21.752 15.002A9.72 9.72 0 0 1 18 15.75c-5.385 0-9.75-4.365-9.75-9.75 0-1.33.266-2.597.748-3.752A9.753 
                                            9.753 0 0 0 3 11.25C3 16.635 7.365 21 12.75 21a9.753 9.753 0 0 0 9.002-5.998Z" />
                                        </svg>
                                    </span>
                                    Mode Sombre
                                </div>
    
                            </li>
                        </ul>
                    </div> -->
                    
                    <div class="mode_claire_sombre_btn seting_hover">
                        Parametres
                        <!-- <div class="mode_btn_title">
                            Mode Claire
                        </div>
                        <div class="mode_btn">
                            <button type="submit" name="btn_bg" class="btn_circle"></button>
                        </div> -->
                    </div>
    
                </div>
                <!-------------------------- PAGE_TITLE ------------------------------->
                <div class="Appname_class" style="font-style: italic;letter-spacing: 1rem;">
                    <!-- <img src="./images/Burundi_Flag.jpg" alt="Burundi_Flag" width="27" height="27"> -->
                    <h1 style="font-weight: 400;">SINGEE<span>App</span></h1>
                </div>

                <div class="nav_img">
                    <img src="./images/Burundi_Flag.jpg" alt="Burundi_Flag" width="40" height="20">
                </div>
            </div>

            <!------------------------------------- NAV_BAR_LISTS --------------------------------------------------------------->
            <div class="nav_bar">
                <!-- NAV_BAR_LIST -->
                <ul>
                    <!-- NAV_BAR_ACCUEIL -->
                    <li class="page_nav_title">
                        <!-- ACCUEIL_LINK -->
                        <a href="./index.php">
                            <!-- ACCUEIL_ICON -->
                            <span id="nav_list_focus" class="menu_list_hover active">
                                <!-- ACCUEIL_ICON_SVG -->
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" 
                                    viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="m2.25 12 8.954-8.955c.44-.439 
                                    1.152-.439 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 
                                    1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 
                                    0 1.125-.504 1.125-1.125V9.75M8.25 21h8.25" />
                                </svg>
                                <span>Accueil</span>
                            </span>
                        </a>
                    </li>

                    <!-- NAV_BAR_S'ENREGISTRER -->
                    <li class="page_nav_title">
                        <!-- S'ENREGISTRER_LINK -->
                        <a href="./enregistrement.php">
                            <!-- S'ENREGISTRER_ICON -->
                            <span id="nav_list_focus" class="menu_list_hover">
                                <!-- S'ENREGISTRER_ICON_SVG -->
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" 
                                    strokeWidth={1.5} stroke="currentColor" className="w-6 h-6">
                                    <path strokeLinecap="round" strokeLinejoin="round" d="M17.982 18.725A7.488 
                                    7.488 0 0 0 12 15.75a7.488 7.488 0 0 0-5.982 2.975m11.963 0a9 9 0 1 0-11.963 0m11.963 
                                    0A8.966 8.966 0 0 1 12 21a8.966 8.966 0 0 1-5.982-2.275M15 9.75a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                                </svg><span>S'enregistrer</span>
                            </span>
                        </a>   
                    </li>

                    <!-- NAV_BAR_APROPOS -->
                    <li class="page_nav_title">
                        <!-- APROPOS_LINK -->
                        <a href="./apropos.php">
                            <!-- APROPOS_ICON -->
                            <span id="nav_list_focus" class="menu_list_hover">
                                <!-- APROPOS_ICON_SVG -->
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" strokeWidth={1.5} 
                                    stroke="currentColor" className="w-6 h-6"><path strokeLinecap="round" strokeLinejoin="round" 
                                    d="M12 9v3.75m0-10.036A11.959 11.959 0 0 1 3.598 6 11.99 11.99 0 0 0 3 9.75c0 5.592 3.824 
                                    10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.31-.21-2.57-.598-3.75h-.152c-3.196 
                                    0-6.1-1.25-8.25-3.286Zm0 13.036h.008v.008H12v-.008Z" />
                                </svg><span>Apropos</span>

                            </span>
                        </a>
                        
                    </li>

                </ul>

            </div>
        </nav>
    </header>

    <!-- <script>
        console.log("heeeee");
        
        document.addEventListener('DOMContentLoaded', function() {
            const navlinks = document.querySelectorAll('#nav_list_focus');
        })

        navlinks.forEach(link => {
            link.addEventListener('click', function (event) {
                navlinks.forEach(navlink => navlink.classList.remove('active'));

                link.classList.toggle('active');
            })
        });
    </> -->

</body>
</html>