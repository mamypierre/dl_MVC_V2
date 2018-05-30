<?php $title = "Administrateur"; 
ob_start(); ?>
<div class="titre" > <h2>  Administrateur </h2> </div> <br><br>

   <div class="addUser">
    <b>Ajouter un utilisateur</b>
        <form action="index.php?Administrateur" method="post" >
        <input name="last_name" type="text" placeholder="Nom"><br>
        <input name="first_name" type="text" placeholder="Prenom"><br>
        <input name="pseudo" type="text" placeholder="Pseudo"><br>
        <input name="email" type="email" placeholder="Email"><br>
        <input name="password1" type="password" placeholder="Mot de passe"><br>
        <input name="password2" type="password" placeholder="Retape motdepass"><br>
        <button type="submit">Inscription</button> <br>
    </form>
    <br>
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
       </div>

<?php $content = ob_get_clean(); ?>
<?php require('template.php'); ?>