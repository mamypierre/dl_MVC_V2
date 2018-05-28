
<?php $title = "liste des forum"; ?>

<?php ob_start(); ?>

<div class="titre" ><h2>Liste des forums</h2></div>
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
    <div class="elemen" > 
        <div class="soustitre">   <a href="index.php?idSousCategory=<?= $list['id_sub_category'] ; ?> "> 
                <?= $list['sub_category_name'] . "<br>" . $list['sub_category_description']; ?>  </a>
        </div>
        <div class="dernierPost"> <a href="#" > dernier poste : </a> </div>
    </div>
<?php }
?>
<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>


