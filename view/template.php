<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title><?= $title ?></title>
        <link href="public/css/style.css" rel="stylesheet" /> 
    </head>

    <body>
        <div class="body" >
            <div class="tete" >
                <div class="logo" > <a href="index.php?forum"><img src="public/img/Fichier 1.png" alt="logo" height="34" width="141"> </a> </div>
                <div class="recherche" > <input type="text" placeholder="recherche" > </div>
            </div>
            <div class="nav1" >
                <div class="nav1Bbo1">
                    <div class="profil" >
                        <p>profil</p>
                    </div>
                    <div class="conect" >                                              
                        <?php if (!isset($_SESSION['pseudo'])) { ?>
                            <div class="accueille3" > <a href="index.php?conn=1" class="a" >Connection</a></div>
                            <div class="accueille3" > <a href="index.php?inscription=1" class="a" >Inscription</a></div>
                        <?php } else { ?>
                            <div class="accueille3" > <a href="index.php?deconnection=1" class="a" >Deconnection</a></div>
                        <?php } ?>                        
                    </div>

                </div>
                <div class="nav1Bbo2">

                    <div class="boutonvan1" > <a href="index.php?forum" >Forum</a> </div>
                    <div class="boutonvan1" > <a href="index.php?Evenement" >Evenement</a></div>
                    <div class="boutonvan1" > <a href="index.php?News" >News</a></div>
                    <?php if (isset($_SESSION['UserType']) && $_SESSION['UserType'] == "webmaster") { ?>
                        <div class="boutonvan1" > <a href="index.php?Administrateur" >Administrateur</a></div>
                    <?php } ?>  
                </div>
            </div>
            <div class="nav2" >  
                <div class="bar1">
                   
                </div>
                <div class="corpPrincipal" >
                    
                         <?= $content ?>                     

                </div>
            </div>





        </div>


    </body>
</html>


