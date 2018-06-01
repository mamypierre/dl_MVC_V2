
<?php $title = "liste des sujets"; ?>

<?php
ob_start();
if ($listsujets && $nomCatego) {
    ?>

    <div class="titre"> 
        <h2> <?= $nomCatego[0]['sub_category_name']; ?> </h2>
    </div>

    <?php foreach ($listsujets as $sujet) { ?>
        <div class="sujet">   
            <a href="index.php?idSujet=<?= $sujet['id_subject']; ?>"> 
                <?= $sujet['subject_name']; ?>
            </a>           
        </div> 
        <?php if (isset($_SESSION['idUser']) && $sujet['id_user'] == $_SESSION['idUser']) { ?>
            <div class="sousCategory"> 
                <a href="index.php?IdSujet=<?= $sujet['id_subject']; ?>"> modifier  </a>
               <!-- <a href="index.php?IdDeleteSujet=<?= $sujet['id_subject']; ?>"> suprimer  </a> -->
            </div>
            <?php
        }
    }
}
?>

<?php if (isset($_SESSION['pseudo'])) { ?>

    <div class="creatSujet"  >
        <form method="post" action="index.php?idSousCategoryCreat=<?= $idSousCategory; ?>">
            <p > creatioin d'un sujet  </p>
            <input type="text" name="nomSujer" placeholder="nom du sujet" required  ><br>                   
            <textarea name="message" rows="10" cols="40" id="message" required placeholder="votre message" ></textarea> <br>
            <input type="submit" value="creat" />
        </form>
    </div>
<?php } ?>

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>