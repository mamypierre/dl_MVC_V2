{include file="header_template_html_smarty_bootstrap.tpl" title=Users}
			<h2>Title: {$title|capitalize}</h2>
			
			The current date and time is {$smarty.now|date_format:"%Y-%m-%d %H:%M:%S"}
			<br><br>
			The value of global assigned variable $SCRIPT_NAME is {$SCRIPT_NAME}
			<br><br>
			Example of accessing server environment variable SERVER_NAME: {$smarty.server.SERVER_NAME}
			
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
										{section name=table_users
										loop=$users}
											{if $smarty.section.table_users.index is odd by 1}
												<tr class="warning">
													<td>Odd</td><td>{$smarty.section.table_users.rownum}</td><td>{$users[table_users].firstname}</td><td>{$users[table_users].lastname}</td><td>{$users[table_users].username}</td>
												</tr>
											{else}
												<tr class="danger">
													<td>Even</td><td>{$smarty.section.table_users.rownum}</td><td>{$users[table_users].firstname}</td><td>{$users[table_users].lastname}</td><td>{$users[table_users].username}</td>
												</tr>
											{/if}
											{sectionelse}
											none
										{/section}

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
		
{include file="footer_template_html_smarty_bootstrap.tpl"}
