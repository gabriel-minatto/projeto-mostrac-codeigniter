<?php $this->load->view("mostratec/admin/includes/header");//carregamos o header e o menu da pagina ?>

<!-- Page Heading -->
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
                Escolas <small>Minhas Escolas</small>
            </h1>
            <ol class="breadcrumb">
                    <li>
                        <a href="<?= base_url('admin/painel') ?>">
                        Painel de Controle
                        </a>
                    </li>
                    <li class="active">
                        Minhas Escolas
                    </li>
            </ol>
            
        </div>
    </div>
<!-- /.row -->
    <div class="row">
            <div class="col-lg-4">
                <div class="jumbotron">
                    <form class="form-horizontal" method="post">
                            <!-- Text input-->
                            <div class="form-group">
                              <label for="name">Nome:</label>
                              <input id="name" name="name" type="text" placeholder="nome da escola" class="form-control input-md">
                            </div>
                            <!-- Text input-->
                            <div class="form-group">
                              <label for="cidade">Cidade:</label>
                              <input id="cidade" name="cidade" type="text" placeholder="cidade da escola" class="form-control input-md">
                            </div>
                            <!-- Select Basic -->
                            <div class="form-group">
                              <label for="rede">Rede de Ensino:</label>
                                <select id="rede" name="rede" class="form-control">
                                    <option value=""></option>
                                  <option value="particular">Particular</option>
                                  <option value="estadual">Estadual</option>
                                  <option value="municipal">Municipal</option>
                                </select>
                            </div>
                            <!-- Text input-->
                            <div class="form-group">
                              <label for="grupo">Grupo:</label>
                              <input id="grupo" name="grupo" type="text" placeholder="grupo" class="form-control input-md">
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
                				Nome
                			</th>
                			<th>
                				Cidade
                			</th>
                			<th>
                				Rede de Ensino
                			</th>
                			<th>
                			    Grupo
                			</th>
                		</tr>
                	</thead>
                	<tbody>
                	    <?php foreach($escolas as $escola){ ?>
                		<tr>
                			<td>
                				<?= $escola->nome ?>
                			</td>
                			<td>
                				<?= $escola->cidade ?>
                			</td>
                			<td>
                				<?= $escola->tipo ?>
                			</td>
                			<td>
                				<?= $escola->grupo ?>
                			</td>
                		</tr>
                		<?php } ?>
                	</tbody>
                </table>
            </div>
        </div>
    </div>

<?php $this->load->view("mostratec/admin/includes/footer");//carregamos o header e o menu da pagina ?>