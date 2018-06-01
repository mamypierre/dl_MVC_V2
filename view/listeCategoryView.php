
<?php $title = "liste des forum"; ?>

<?php ob_start(); ?>

<?php
$temp = NULL;
foreach ($listCategorieSoucategrie as $list) {
    if (isset($temp) && $temp != $list['category_name']) {
        $temp = NULL;
    }
    if (!isset($temp)) {
        ?>               
        <div class="titre" >
            <h3> <?=
                $list['category_name'];
                $temp = $list['category_name'];
                ?>
            </h3>
        </div>
    <?php }
    ?>
    <div class="corpConten" > 
        <div class="nomSoucategory">   <a class="nonCategory" href="index.php?idSousCategory=<?= $list['id_sub_category']; ?> "> 
                <?= $list['sub_category_name']?>  </a>
        </div>
        <div class="descriptionSoucat"> <a class="descriptionCategory"href="index.php?idSousCategory=<?= $list['id_sub_category']; ?>" ><?= $list['sub_category_description']; ?></a> </div>
    </div>
<?php }
?>
<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>


