<?php $this->load->view("mostratec/admin/includes/header");//carregamos o header e o menu da pagina ?>

<!-- Page Heading -->
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
                Grupo <small>Gerenciamento</small>
            </h1>
            <ol class="breadcrumb">
                    <li>
                        <a href="<?= base_url('admin/painel') ?>">
                            <i class="fa fa-dashboard"></i> Painel de Controle
                        </a>
                    </li>
                    <li>
                        <a href="<?= base_url('admin/grupos/meus-grupos') ?>">
                            <i class="fa fa-dashboard"></i>Meus Grupos
                        </a>
                    </li>
                    <li class="active">
                        <i class="fa fa-dashboard"></i>Gerenciamento
                    </li>
            </ol>
        </div>
    </div>
<!-- /.row -->
    <div class="row">
        <div class="col-lg-10">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <?= $grupo->nome ?>
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <!-- Nav tabs -->
                            <ul class="nav nav-tabs">
                                <li class="active"><a href="#alunos" data-toggle="tab">Alunos</a>
                                </li>
                                <li><a href="#posts" data-toggle="tab">Posts</a>
                                </li>
                                <li><a href="#relatorios" data-toggle="tab">Relatórios</a>
                                </li>
                                <li><a href="#moderadores" data-toggle="tab">Moderadores</a>
                                </li>
                            </ul>

                            <!-- tab de alunos -->
                            <div class="tab-content">
                                <div class="tab-pane fade in active" id="alunos">
                                    <div class="row">
                                        <div class="col-lg-4">
                                            <div class="jumbotron">
                                                <form class="form-horizontal" method="post">
                                                        <!-- Text input-->
                                                        <div class="form-group">
                                                          <label for="name">Nome:</label>
                                                          <input id="name" name="name" type="text" placeholder="nome do aluno" class="form-control input-md">
                                                        </div>
                                                        <!-- Text input-->
                                                        <div class="form-group">
                                                          <label for="email">Email:</label>
                                                          <input id="email" name="email" type="text" placeholder="email do aluno" class="form-control input-md">
                                                        </div>
                                                        <!-- Text input-->
                                                        <div class="form-group">
                                                          <label for="escola">Escola:</label>
                                                          <input id="escola" name="escola" type="text" placeholder="escola do grupo" class="form-control input-md">
                                                        </div>
                                                        <!-- Text input-->
                                                        <div class="form-group">
                                                          <label for="categoria">Categoria:</label>
                                                          <input id="categoria" name="categoria" type="text" placeholder="categoria do grupo" class="form-control input-md">
                                                        </div>
                                                        <div class="form-group">
                                                            <button class="btn btn-default">Filtrar</button>
                                                        </div>
                                                </form>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-lg-offset-1">
                                            <div style="overflow: auto; max-height: 400px;">
                                                <table class="table table-bordered table-striped table-hover table-responsive">
                                                	<thead>
                                                		<tr>
                                                			<th>
                                                				Aluno
                                                			</th>
                                                			<th>
                                                			    Email
                                                			</th>
                                                			<th>
                                                			    Escola
                                                			</th>
                                                			<th colspan='2'>
                                                				Categoria
                                                			</th>
                                                		</tr>
                                                	</thead>
                                                	<tbody>
                                                	    <?php foreach($alunos as $aluno){ ?>
                                                		<tr>
                                                			<td>
                                                				<?= $aluno->aluno ?>
                                                			</td>
                                                			<td>
                                                				<?= $aluno->email ?>
                                                			</td>
                                                			<td>
                                                				<?= $aluno->escola ?>
                                                			</td>
                                                			<td>
                                                				<?= $aluno->categoria ?>
                                                			</td>
                                                			<td>
                                                    			 <a href='<?= base_url("admin/grupos/alunos/remover/".$grupo->id."/".$aluno->id) ?>'>
                                                        			 <button type="button" class="btn btn-warning btn-circle btn-xl confirmation">
                                                        			      <i class="fa fa-times"></i>
                                                        			 </button>
                                                    			 </a>
                                                			</td>
                                                		</tr>
                                                		<?php } ?>
                                                	</tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- fim tab de alunos -->
                                <div class="tab-pane fade" id="posts">
                                    <h4>Profile Tab</h4>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                                </div>
                                <div class="tab-pane fade" id="relatorios">
                                    <h4>Messages Tab</h4>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                                </div>
                                <div class="tab-pane fade" id="moderadores">
                                    <h4>Settings Tab</h4>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                                </div>
                            </div>
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
    </div>
<!-- /.row -->
<?php $this->load->view("mostratec/admin/includes/footer");//carregamos o header e o menu da pagina ?>