<?php if(empty($this->session->flashdata("selected_tab"))){  ?>
<div class="tab-pane fade in active" id="alunos">
<?php }else{ ?>
<div class="tab-pane fade" id="alunos">
<?php } ?>
<br>
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
            <div class="panel panel-primary">
                
                    <div class="panel-heading">
                        <span class="hidden-xs">
                            Alunos do grupo
                        </span>
                        <b><?= $grupo->nome ?></b>
                        <div class="pull-right action-buttons">
                            <div class="btn-group pull-right">
                                <a data-toggle="modal" data-target="#add_student_to_group_modal">
                        			 <button id="new_student_group" type="button" class="btn btn-success btn-circle btn-xs">
                        			      <i class="fa fa-plus"></i>
                        			 </button>
                    			 </a>
                            </div>
                        </div>
                    </div>
                    <div class="panel-body">
                        <div style="overflow: auto; max-height: 400px;">
                            <div class="panel-group">
                                <?php foreach($alunos as $aluno){ ?>
                                    <div class="panel panel-default">
                                        <div class="panel-heading">
                                            <h4 class="panel-title">
                                                <a data-toggle="collapse" data-parent="#accordion" href="#collapse_<?= $aluno->id ?>"><?= $aluno->aluno ?></a>
                                                <a href='<?= base_url("admin/grupos/alunos/remover/".$grupo->id."/".$aluno->id) ?>'>
                                        			 <button type="button" class="btn btn-danger btn-circle btn-xs confirmation pull-right">
                                        			      <i class="fa fa-times"></i>
                                        			 </button>
                                    			 </a>
                                            </h4>
                                        </div>
                                        <div id="collapse_<?= $aluno->id ?>" class="panel-collapse collapse">
                                            <div class="panel-body">
                                                <?= $aluno->email ?>
                                            </div>
                                        </div>
                                    </div>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

