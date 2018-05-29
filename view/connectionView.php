
<?php $title = "connection"; ?>

<?php ob_start(); ?>
<div id="w" class="easyui-window" title="Connexion" data-options="iconCls:'icon-save'" style="width:300px;height:280px;padding:10px;">
    <form action="index.php" method="post" >
        <label for="pseudo"><b>Pseudo</b></label><br>
        <input name="pseudo" type="text" placeholder="ton pseudo"><br> 
        <label for="motdepass"><b>Mot de passe</b></label><br>
        <input name="motdepass" type="password" placeholder="ton mot de passe"><br>
        <button class="bt2" type="submit">Connection</button><br>
        <?php
        if (isset($error)) {
            echo $error;
        }
        ?>
    </form>

</div>

<?php $content = ob_get_clean(); ?>
<?php require('template.php'); ?>

