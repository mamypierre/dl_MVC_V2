<?php $title = "Administrateur"; 
ob_start(); ?>
<div class="titre" > <h2>  Administrateur </h2> </div> <br><br>

   <div class="addUser">
    <b>Ajouter un utilisateur</b>
    <form action="index.php?Administrateur" method="post" >
        <input type="text" name="user_name" placeholder="Pseudo"><br>
        <input type="text" name="password" placeholder="MotDePasse"><br>
         <input type="text" name="email" placeholder="Email"><br>
        <input type="submit" value="Ajouter utilisateur">
    </form>
    <br>

<?php
include_once('../DAOSingleton/Requete.php');

    if (isset($_POST['user_name'])&&isset($_POST['password'])&&isset($_POST['email'])) {
            if(Requete::inser("user","pseudo,password,email_inscription",$_POST['user_name'].$_POST['password'].$_POST['email_inscription'])){
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

<?php
include_once('../DAOSingleton/Requete.php');

    if (isset($_POST['user_nameDel'])) {
            if(Requete::delete("user","pseudo",$_POST['user_name'])){
                echo "Utilisateur supprimer";

            }else{
                echo "Effacement echoué"; 
            }
    } ?>
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