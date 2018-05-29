<?php $title = "Administrateur"; 
ob_start(); ?>
<div class="titre" > <h2>  Administrateur </h2> </div> <br><br>

   <div class="addUser">
    <b>Ajouter un utilisateur</b>
        <form action="index.php" method="post" >
        <input name="nom" type="text" placeholder="Nom"><br>
        <input name="prenom" type="text" placeholder="Prenom"><br>
        <input name="pseudo" type="text" placeholder="Pseudo"><br>
        <input name="email" type="email" placeholder="Email"><br>
        <input name="motdepass1" type="password" placeholder="Mot de passe"><br>
        <input name="motdepass2" type="password" placeholder="Retape motdepass"><br>
        <button type="submit">Inscription</button> <br>
        <?php
        if (isset($error)) {
            if (is_array($error)) {
                echo $error[2];
            } else {
                echo $error;
            }
        }
        ?>

    </form>
    <br>

<?php
include_once('../DAOSingleton/Requete.php');

    if (isset($_POST['user_name'])&&isset($_POST['password'])&&isset($_POST['email'])) {
            if(Requete::inser("user","pseudo,password,email_inscription,id_user_type,id_information",$_POST['user_name'].$_POST['password'].$_POST['email_inscription'])){
                echo "Utilisateur inscrit";

            }else{
                echo "Inscription echoué"; 
            }
    } ?>
</div>    
     
       <div class="deleteUser">
    <b>Supprimer un utilisateur</b>
    <form action="index.php?Administrateur" method="post" >
        <input type="text" name="user_nameDel" placeholder="Pseudo"><br>
        <input type="submit" value="Supprimer utilisateur">

    </form>
    <br>

</div>
<div class="addNews">
    <b>Ajouter une actualité</b>
    <form action="index.php?Administrateur" method="post" >
        <input type="text" name="news" placeholder="Ecrire actualité" ><br>
        <input type="submit" value="Ajouter actualité">
    </form>
    
<?php
    if (isset($_POST['news'])) {
        $test = $_POST['news'] ;
            if(Requete::inser("news","description","'{$test}'" )){
                echo "News ajouté";
            }else{
                echo "Ajout news echoué"; 
                }
    } ?>
    </div>

<?php $content = ob_get_clean(); ?>
<?php require('template.php'); ?>