<?php
/* Smarty version 3.1.31, created on 2018-05-31 07:29:09
  from "/Applications/MAMP/htdocs/dl_MVC_V2/view/contenuMail.html" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.31',
  'unifunc' => 'content_5b0fa44508a879_22945591',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '11deeb9cacd3079223effcd22c7f116290b89cfe' => 
    array (
      0 => '/Applications/MAMP/htdocs/dl_MVC_V2/view/contenuMail.html',
      1 => 1527749685,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5b0fa44508a879_22945591 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->compiled->nocache_hash = '4979402965b0fa4450440e7_82118311';
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
