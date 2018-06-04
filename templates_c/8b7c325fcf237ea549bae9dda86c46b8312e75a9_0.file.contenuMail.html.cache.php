<?php
/* Smarty version 3.1.31, created on 2018-06-04 12:54:21
  from "/Applications/MAMP/htdocs/dl_MVC_V2/view/contenuMail.html" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.31',
  'unifunc' => 'content_5b15367d9fa914_44980077',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '8b7c325fcf237ea549bae9dda86c46b8312e75a9' => 
    array (
      0 => '/Applications/MAMP/htdocs/dl_MVC_V2/view/contenuMail.html',
      1 => 1527774942,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5b15367d9fa914_44980077 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->compiled->nocache_hash = '1202077865b15367d9b97d9_67964420';
?>
<!DOCTYPE html>
<html lang="fr">

			
            <body>
                <b style="color :green;">Votre nom: </b><?php echo $_smarty_tpl->tpl_vars['nom']->value;?>
 <br>  
                <b style="color :green;">Votre prénom: </b><?php echo $_smarty_tpl->tpl_vars['prenom']->value;?>
 <br>
                <b style="color :green;">votrepseudo est:</b><?php echo $_smarty_tpl->tpl_vars['pseudo']->value;?>
<br>
                <b style="color :green;">Votre e-mail : </b> <?php echo $_smarty_tpl->tpl_vars['courriel']->value;?>
 <br><br>
                <b style="color :green;">Votre mot de passe </b><?php echo $_smarty_tpl->tpl_vars['mdp']->value;?>
 <br>
                
            </body>
        </html>
<?php }
}
