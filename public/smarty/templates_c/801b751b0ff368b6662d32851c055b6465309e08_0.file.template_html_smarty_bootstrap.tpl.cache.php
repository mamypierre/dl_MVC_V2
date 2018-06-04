<?php
/* Smarty version 3.1.31, created on 2018-05-29 11:36:59
  from "/Applications/MAMP/htdocs/smarty/template_html_smarty_bootstrap.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.31',
  'unifunc' => 'content_5b0d3b5b61c680_71036125',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '801b751b0ff368b6662d32851c055b6465309e08' => 
    array (
      0 => '/Applications/MAMP/htdocs/smarty/template_html_smarty_bootstrap.tpl',
      1 => 1482085388,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:header_template_html_smarty_bootstrap.tpl' => 1,
    'file:footer_template_html_smarty_bootstrap.tpl' => 1,
  ),
),false)) {
function content_5b0d3b5b61c680_71036125 (Smarty_Internal_Template $_smarty_tpl) {
if (!is_callable('smarty_modifier_capitalize')) require_once '/Applications/MAMP/htdocs/smarty/smarty-master/libs/plugins/modifier.capitalize.php';
if (!is_callable('smarty_modifier_date_format')) require_once '/Applications/MAMP/htdocs/smarty/smarty-master/libs/plugins/modifier.date_format.php';
$_smarty_tpl->compiled->nocache_hash = '11257612325b0d3b5b509893_38923375';
$_smarty_tpl->_subTemplateRender("file:header_template_html_smarty_bootstrap.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 9999, $_smarty_tpl->cache_lifetime, array('title'=>'Users'), 0, false);
?>

			<h2>Title: <?php echo smarty_modifier_capitalize($_smarty_tpl->tpl_vars['title']->value);?>
</h2>
			
			The current date and time is <?php echo smarty_modifier_date_format(time(),"%Y-%m-%d %H:%M:%S");?>

			<br><br>
			The value of global assigned variable $SCRIPT_NAME is <?php echo $_smarty_tpl->tpl_vars['SCRIPT_NAME']->value;?>

			<br><br>
			Example of accessing server environment variable SERVER_NAME: <?php echo $_SERVER['SERVER_NAME'];?>

			
			<br><br>
			<!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Hover Rows
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
											<th>Odd/Even</th>
                                            <th>#</th>
                                            <th>First Name</th>
                                            <th>Last Name</th>
                                            <th>Username</th>
                                        </tr>
                                    </thead>
                                    <tbody>
										<?php
$__section_table_users_0_saved = isset($_smarty_tpl->tpl_vars['__smarty_section_table_users']) ? $_smarty_tpl->tpl_vars['__smarty_section_table_users'] : false;
$__section_table_users_0_loop = (is_array(@$_loop=$_smarty_tpl->tpl_vars['users']->value) ? count($_loop) : max(0, (int) $_loop));
$__section_table_users_0_total = $__section_table_users_0_loop;
$_smarty_tpl->tpl_vars['__smarty_section_table_users'] = new Smarty_Variable(array());
if ($__section_table_users_0_total != 0) {
for ($__section_table_users_0_iteration = 1, $_smarty_tpl->tpl_vars['__smarty_section_table_users']->value['index'] = 0; $__section_table_users_0_iteration <= $__section_table_users_0_total; $__section_table_users_0_iteration++, $_smarty_tpl->tpl_vars['__smarty_section_table_users']->value['index']++){
$_smarty_tpl->tpl_vars['__smarty_section_table_users']->value['rownum'] = $__section_table_users_0_iteration;
?>
											<?php if ((1 & (isset($_smarty_tpl->tpl_vars['__smarty_section_table_users']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_table_users']->value['index'] : null) / 1)) {?>
												<tr class="warning">
													<td>Odd</td><td><?php echo (isset($_smarty_tpl->tpl_vars['__smarty_section_table_users']->value['rownum']) ? $_smarty_tpl->tpl_vars['__smarty_section_table_users']->value['rownum'] : null);?>
</td><td><?php echo $_smarty_tpl->tpl_vars['users']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_table_users']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_table_users']->value['index'] : null)]['firstname'];?>
</td><td><?php echo $_smarty_tpl->tpl_vars['users']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_table_users']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_table_users']->value['index'] : null)]['lastname'];?>
</td><td><?php echo $_smarty_tpl->tpl_vars['users']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_table_users']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_table_users']->value['index'] : null)]['username'];?>
</td>
												</tr>
											<?php } else { ?>
												<tr class="danger">
													<td>Even</td><td><?php echo (isset($_smarty_tpl->tpl_vars['__smarty_section_table_users']->value['rownum']) ? $_smarty_tpl->tpl_vars['__smarty_section_table_users']->value['rownum'] : null);?>
</td><td><?php echo $_smarty_tpl->tpl_vars['users']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_table_users']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_table_users']->value['index'] : null)]['firstname'];?>
</td><td><?php echo $_smarty_tpl->tpl_vars['users']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_table_users']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_table_users']->value['index'] : null)]['lastname'];?>
</td><td><?php echo $_smarty_tpl->tpl_vars['users']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_table_users']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_table_users']->value['index'] : null)]['username'];?>
</td>
												</tr>
											<?php }?>
											<?php }} else {
 ?>
											none
										<?php
}
if ($__section_table_users_0_saved) {
$_smarty_tpl->tpl_vars['__smarty_section_table_users'] = $__section_table_users_0_saved;
}
?>

                                    </tbody>
                                </table>
                            </div>
                            <!-- /.table-responsive -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
				   </div>
        <!-- /#page-wrapper -->
		
<?php $_smarty_tpl->_subTemplateRender("file:footer_template_html_smarty_bootstrap.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 9999, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<?php }
}
