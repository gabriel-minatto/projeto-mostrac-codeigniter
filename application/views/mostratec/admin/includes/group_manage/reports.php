<?php if($this->session->flashdata("selected_tab") == "relatorios"){  ?>
<div class="tab-pane fade in active" id="relatorios">
<?php }else{ ?>
<div class="tab-pane fade" id="relatorios">
<?php } ?>
<div class="col-lg-12">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <span class="hidden-xs">
                        Relatórios do grupo
                    </span>
                    <b><?= $grupo->nome ?></b>
                    <div class="pull-right action-buttons">
                        <div class="btn-group pull-right">
                            <a data-toggle="modal" data-target="#new_report_<?= $grupo->id ?>">
                                <button id="new_student_group" type="button" class="btn btn-success btn-circle btn-xs">
                                <i class="fa fa-plus"></i>
                                </button>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="panel-body">
                    <!--<div style="overflow: auto; max-height: 400px;">-->
                        <div class="panel-group">
                            <?php foreach($reports as $report){ ?>
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h4 class="panel-title">
                                            <a data-toggle="collapse" data-parent="#accordion" href="#collapse_report_<?= $report->id ?>"><?= $report->nome ?></a>
                                            
                                            <a href='<?= base_url("admin/grupos/reports/deletar/".$grupo->id."/".$report->id) ?>'>
                                    			 <button type="button" class="btn btn-danger btn-circle btn-xs confirmation pull-right" style="margin-left: 5px;">
                                    			      <i class="fa fa-times"></i>
                                    			 </button>
                                			 </a>
                                            
                                            <a data-toggle="modal" data-target="#edit_report_<?= $report->id ?>">
                                    			 <button id="new_student_group" type="button" class="btn btn-warning btn-circle btn-xs pull-right">
                                    			      <i class="fa fa-pencil"></i>
                                    			 </button>
                                			 </a>
                                            
                                		</h4>
                                    </div>
                                    <div id="collapse_report_<?= $report->id ?>" class="panel-collapse collapse">
                                        <div class="panel-body">
                                            <?= $report->content ?>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>
                        </div>
                    <!--</div>    -->
                </div>
            </div>
        </div>
    </div>