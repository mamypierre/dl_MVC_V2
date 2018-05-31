<?php $title = "modif sujet"; ?>

<?php ob_start(); ?>
<?php if (isset($_SESSION['pseudo'])) { ?>
    <div class="sujetEdit"  >
        <form method="post" action="index.php?IdEditSujet=<?= $idsubjet; ?>">
            <input type="textarea" name="sujetEdit"  value="<?= $nomSujet[0]['subject_name']; ?>"   id="edit" required  >               
             <br>
            <input type="submit" value="modifier" />
        </form>
    </div>
    </div>
<?php } ?>

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>

