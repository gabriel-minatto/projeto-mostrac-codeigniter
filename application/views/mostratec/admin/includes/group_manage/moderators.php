<?php if($this->session->flashdata("selected_tab") == "moderadores"){  ?>
<div class="tab-pane fade in active" id="moderadores">
<?php }else{ ?>
<div class="tab-pane fade" id="moderadores">
<?php } ?>
    <div class="row">
        <div class="col-lg-4">
            <div class="jumbotron">
                <form class="form-horizontal" method="post">
                        <!-- Text input-->
                        <div class="form-group">
                          <label for="moderator_name">Nome:</label>
                          <input id="moderator_name" name="moderator_name" type="text" placeholder="nome do moderador" class="form-control input-md">
                        </div>
                        <!-- Text input-->
                        <div class="form-group">
                          <label for="moderator_email">Email:</label>
                          <input id="moderator_email" name="moderator_email" type="text" placeholder="email do moderador" class="form-control input-md">
                        </div>
                        <input type="hidden" name="moderator_filter" value="active">
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
                        Moderadores do grupo
                    </span>
                    <b><?= $grupo->nome ?></b>
                    <div class="pull-right action-buttons">
                        <div class="btn-group pull-right">
                            <a data-toggle="modal" data-target="#add_moderator_to_group_modal">
                                <button id="new_moderator_group" type="button" class="btn btn-success btn-circle btn-xs">
                                    <i class="fa fa-plus"></i>
                                </button>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="panel-body">
                    <div style="overflow: auto; max-height: 400px;">
                        <div class="panel-group">
                            <?php foreach($moderators as $moderator){ ?>
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h4 class="panel-title">
                                            <a data-toggle="collapse" data-parent="#accordion" href="#collapse_moderator_<?= $moderator->moderation_id ?>"><?= $moderator->nome ?></a>
                                            <?php if(is_admin()){ ?>
                                            <a href="<?= base_url('admin/grupos/moderadores/deletar/'.$moderator->moderation_id) ?>">
                                    			 <button type="button" class="btn btn-danger btn-circle btn-xs confirmation pull-right">
                                    			      <i class="fa fa-times"></i>
                                    			 </button>
                                			 </a>
                                			 <?php } ?>
                                        </h4>
                                    </div>
                                    <div id="collapse_moderator_<?= $moderator->moderation_id ?>" class="panel-collapse collapse">
                                        <div class="panel-body">
                                            <?= $moderator->email ?>
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