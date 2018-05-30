<?php $title = "liste des messages"; ?>

<?php ob_start();
if ($listeMessages && $nomSujet) {
    ?>
    <div class="titre" > <h2> <?= $nomSujet[0]['subject_name']; ?> </h2> </div>
    <div class="posts" >
        <?php foreach ($listeMessages as $message) { ?>
            <div class="post" > <p> <?= $message['content']; ?> </p> </div>
        <?php }
    }
    ?>


<?php if (isset($_SESSION['pseudo'])) { ?>
        <div class="creatSujet"  >
            <form method="post" action="index.php?idSuj=<?= $idSujet; ?>">
                <textarea name="message" rows="10" cols="90" id="message" required placeholder="votre message" ></textarea> <br>
                <input type="submit" value="repondre" />
            </form>
        </div>
    </div>
<?php } else { ?>
    <p> Erreur aucun contenue!</p>
<?php } ?>
<?php $content = ob_get_clean(); ?>
<?php require('template.php'); ?>