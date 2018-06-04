
<?php $title = "Profil";
?>


<?php ob_start(); ?>


<div style="margin:20px 0 10px 0;"></div>
<div class="easyui-panel" title="Affichage des informations de Profil" style="width:800px;height:600px;padding:10px;">
    <div class="easyui-layout" data-options="fit:true">
        <div data-options="region:'west',split:true" style="width:100px;padding:10px;vertical-align: central;">
            <p><?php print_r($_GET['pseudo']); ?></p>
        </div>

        <div data-options="region:'east',split:true" style="width:100px;padding:20px;">

            <p><img src="https://www.w3schools.com/howto/img_avatar.png" class="avatar"></p>
        </div>
        <div id="p" data-options="region:'center'" style="padding:10px">
            <p style="font-size:18px">Profil de  <?php print $pseudo[0]["first_name"] . " " . $pseudo[0]["last_name"]; ?> </p>
            <p style="font-size:12px">Promotion :  <?php if ($pseudo[0]["training_start"]!=null||$pseudo[0]["training_end"]!=null) print date("Y", strtotime($pseudo[0]["training_start"])); else print "";?>
                                                   <?php if ($pseudo[0]["training_start"]!=null||$pseudo[0]["training_end"]!=null) print date("Y", strtotime($pseudo[0]["training_end"])); else print "";?></p>
            <p style="font-size:12px">ent en : <?php if ($pseudo[0]["training_start"]!=null)print date("M", strtotime($pseudo[0]["training_start"])); else print "";?> 
                                               <?php if ($pseudo[0]["training_start"]!=null)print date("Y", strtotime($pseudo[0]["training_start"])); else print "";?>
                                 <br>fini en : <?php if ($pseudo[0]["training_end"]!=null)print date("M", strtotime($pseudo[0]["training_end"]));else print ""; ?>
                                               <?php if ($pseudo[0]["training_end"]!=null)print date("Y", strtotime($pseudo[0]["training_end"]));else print ""; ?></p>
            <p>entreprise actuelle : <?php print $pseudo[0]["company"]; ?></p>
            
            
            <div class="elcontact">
                <div class="mail">Contacter <?php print_r($_GET['pseudo']); ?></div><br>
                <label for="exp"><b>Expéditeur</b></label><br>
                <input name="exp" type="text" placeholder="ton nom"><br> 
                <label for="message"><b>Message</b></label><br>
                <input name="message" type="text" height="200" placeholder="ton message"><br><br>
                <input type="radio" name="chat">Chat<br>	
                <input type="radio" name="mail" checked="true">Mail<br>
                <button class="bt2" type="submit">Envoyer</button><br>
                
                
            </div>




        </div>
    </div>
</div>


<?php $content = ob_get_clean(); ?>
<?php require('template.php'); ?>

