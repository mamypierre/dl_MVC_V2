
<?php $title = "inscription"; ?>

<?php ob_start(); ?>
<div id="w" class="easyui-window" title="Demande d'inscription" data-options="iconCls:'icon-save'" style="width:400px;height:580px;padding:10px;">
    <form action="index.php" method="post" >
        <div class="boxrech">
                <label for="nom"><b>Nom</b></label><br>
                <input name="nom" type="text" placeholder="votre nom"><br>
                <label for="prenom"><b>Prénom</b></label><br>
                <input name="prenom" type="text" placeholder="votre prénom"><br>
                <label for="pseudo"><b>Pseudo</b></label><br>
                <input name="pseudo" type="text" placeholder="choisissez un pseudo"><br>
                <label for="email"><b>Mail</b></label><br>
                <input name="email" type="email" placeholder="votre adresse email"><br>
                <label for="motdepass1"><b>Mot de passe</b></label><br>
                <input name="motdepass1" type="password" placeholder="mot de passe"><br>
                <label for="motdepass2"><b>Mot de passe</b></label><br>
                <input name="motdepass2"type="password" placeholder="retapez votre mot de passe"><br>
                <button class="bt2" type="submit">insciption</button> <br>
            </div>
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
</div>
<?php $content = ob_get_clean(); ?>
<?php require('template.php'); ?>