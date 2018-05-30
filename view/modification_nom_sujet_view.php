<?php $title = "modif message"; ?>

<?php ob_start(); ?>
<?php if (isset($_SESSION['pseudo'])) { ?>
    <div class="creatSujet"  >
        <form method="post" action="index.php?idSuj=<?= $idsubjet; ?>">
            <input type="textarea" name="message"  value="<?= $nomSujet[0]['subject_name']; ?>"   id="message" required  >               
             <br>
            <input type="submit" value="modifier" />
        </form>
    </div>
    </div>
<?php } ?>

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>

