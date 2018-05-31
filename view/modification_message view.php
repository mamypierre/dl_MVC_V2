<?php $title = "modif message"; ?>

<?php ob_start(); ?>
<?php if (isset($_SESSION['pseudo'])) { ?>
    <div class="updatMessage"  >
        <form method="post" action="index.php?IdEditMessage=<?= $id_message; ?>">
            <input  type="textarea" name="contentMessageEdit"  value="<?= htmlspecialchars($content[0]['content']); ?>"   id="edit" required  >               
             <br>
            <input type="submit" value="modifier" />
        </form>
    </div>
    </div>
<?php } ?>

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>
