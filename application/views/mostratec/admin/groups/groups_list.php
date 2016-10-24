<?php $this->load->view("mostratec/admin/includes/header");//carregamos o header e o menu da pagina ?>

<!-- Page Heading -->
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
                Grupos <small>Todos os Grupos</small>
            </h1>
            <ol class="breadcrumb">
                    <li>
                        <a href="<?= base_url('admin/painel') ?>">
                        <i class="fa fa-dashboard"></i> Painel de Controle
                        </a>
                    </li>
                    <li class="active">
                        <i class="fa fa-dashboard"></i>Todos os Grupos
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
                              <input id="name" name="name" type="text" placeholder="nome do grupo" class="form-control input-md">
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
                				Nome
                			</th>
                			<th>
                				Escola
                			</th>
                			<th>
                				Categoria
                			</th>
                			<th colspan='2'>
                			    &nbsp;
                			</th>
                		</tr>
                	</thead>
                	<tbody>
                	    <?php foreach($grupos as $grupo){ ?>
                		<tr>
                			<td>
                				<?= $grupo->nome ?>
                			</td>
                			<td>
                				<?= $grupo->escola ?>
                			</td>
                			<td>
                				<?= $grupo->categoria ?>
                			</td>
                		    <td>
                			    <a href='<?= base_url("admin/grupos/gerenciar/".$grupo->id) ?>'>
                			        <button class="btn btn-success">Gerenciar</button>
                			    </a>
                			</td>
                		</tr>
                		<?php } ?>
                	</tbody>
                </table>
            </div>
        </div>
    </div>
<?php $this->load->view("mostratec/admin/includes/footer");//carregamos o header e o menu da pagina ?>