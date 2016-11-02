<?php if(empty($this->session->flashdata("selected_tab"))){  ?>
<div class="tab-pane fade in active" id="alunos">
<?php }else{ ?>
<div class="tab-pane fade" id="alunos">
<?php } ?>
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
                        <input type="hidden" name="student_filter" value="active">
                        <div class="form-group">
                            <button class="btn btn-default">Filtrar</button>
                        </div>
                </form>
            </div>
        </div>
        <div class="col-lg-8">
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
                			    <a data-toggle="modal" data-target="#add_student_to_group_modal">
                        			 <button id="new_student_group" type="button" class="btn btn-success btn-circle btn-xs">
                        			      <i class="fa fa-plus"></i>
                        			 </button>
                    			 </a>
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
                    			 <a href='<?= base_url("admin/grupos/alunos/remover/".$grupo->id."/".$aluno->id) ?>'>
                        			 <button type="button" class="btn btn-warning btn-circle btn-xs confirmation">
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