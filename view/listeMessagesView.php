<?php $title = "liste des messages"; ?>

<?php
ob_start();
if ($listeMessages && $nomSujet) {
    ?>
    <div class="titre" > <h2> <?= $nomSujet[0]['subject_name']; ?> </h2> </div>
    <div class="posts" >
        <?php foreach ($listeMessages as $message) { ?>
        <div class="post" > <p> <?php echo $message['pseudo'].':  '. $message['content']; ?> </p> </div>
        
        <?php if (isset($_SESSION['idUser']) && $message['id_user'] == $_SESSION['idUser']) { ?>
            <div class="sousCategory"> 
                <a href="index.php?IdMessage=<?= $message['id_message']; ?>"> modifier  </a>
                <a href="index.php?deleteMessage=<?= $message['id_message']; ?>"> suprimer  </a> 
            </div>
        <?php } } ?>
        </div>
    <?php } ?>
    


<?php if (isset($_SESSION['pseudo'])) { ?>
    <div class="creatSujet"  >
        <form method="post" action="index.php?idSuj=<?= $idSujet; ?>">
            <textarea name="message" rows="10" cols="90" id="message" required placeholder="votre message" ></textarea> <br>
            <input type="submit" value="repondre" />
        </form>
    </div>

<?php } ?>
<?php $content = ob_get_clean(); ?>
<?php require('template.php'); ?>