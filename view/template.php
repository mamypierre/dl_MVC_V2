<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title><?= $title ?></title>
        <link href="public/css/style.css" rel="stylesheet" /> 
        <link rel="stylesheet" type="text/css" href="public/jqueasyui/themes/default/easyui.css">
        <link rel="stylesheet" type="text/css" href="public/jqueasyui/themes/icon.css">
        <link rel="stylesheet" type="text/css" href="public/jqueasyui/demo/demo.css">
        <script type="text/javascript" src="public/jqueasyui/jquery.min.js"></script>
        <script type="text/javascript" src="public/jqueasyui/jquery.easyui.min.js"></script>
    </head>

    <body>
        <div class="body" >
            <div class="tete" >
                <div class="accueille" > 
                    <div class="accueille1" ><a href="index.php?forum"><img src="public/img/logo.png" alt="logo" height="100" width="100"> </a> </div>
                    <div class="accueille2" > <a href="index.php"class="a" >Accueil</a></div>
                </div>
                <div class="connection" > 
                    <?php if (!isset($_SESSION['pseudo'])) { ?>
                        <div class="accueille3" > <a href="index.php?conn=1" class="a" >Connection</a></div>
                        <div class="accueille3" > <a href="index.php?inscription=1" class="a" >Inscription</a></div>
                    <?php } else { ?>
                        <div class="accueille3" > <a href="index.php?deconnection=1" class="a" >Deconnection</a></div>
                    <?php } ?> 

                </div>

            </div>
            <div class="nav1" >
                <div class="boutonvan1" > <a href="index.php?forum" >Forum</a> </div>
                <div class="boutonvan1" > <a href="index.php?Evenement" >Evenement</a></div>
                <div class="boutonvan1" > <a href="index.php?News" >News</a></div>
            </div>


            <div class="corp" >

                <?= $content ?>

            </div>

            <div class="nav2" >               
                <div class="recher" >
                    <form class="form">
                        <div class="recherche">
                                        <br>
                            <input class="easyui-combobox" id="users" name="user" data-options="valueField:'pseudo',textField:'ConcatenatedString', url:'view/listeutilisateurs.php',onSelect:function(record){
                                   parent.location.href='index.php?profil=1&pseudo='+record.pseudo; 
                                   },onChange:function(newValue,oldValue){ $('#utilisateurs').combobox('reload','view/listeutilisateurs.php?saisie='+newValue);}">
                            <br>     <!-- suite de l'URL/index.php?profil=1 -->
                        </div>
                    </form>
                </div>             
            </div>
            <div class="pied" >
                <div >footer</div>                
            </div>


        </div>


    </body>
</html>


