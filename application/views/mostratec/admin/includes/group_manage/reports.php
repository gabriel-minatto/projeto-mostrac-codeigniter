<?php if($this->session->flashdata("selected_tab") == "relatorios"){  ?>
<div class="tab-pane fade in active" id="relatorios">
<?php }else{ ?>
<div class="tab-pane fade" id="relatorios">
<?php } ?>
    <div class="col-lg-12">
        <div class="row">
            <div class="col-lg-1 col-lg-offset-11 text-center">
                <div class="row">
                     <a data-toggle="modal" data-target="#new_report_<?= $grupo->id ?>">
            			 <button id="new_student_group" type="button" class="btn btn-success btn-circle">
            			      <i class="fa fa-plus"></i>
            			 </button>
        			 </a>
                </div>    
            </div>
        </div><br>
        <div class="row">
            <?php foreach($reports as $report){ ?>
                <div class="col-lg-6">
                    <div class="panel panel-info">
                        <div class="panel-heading">
                            Relatório <b><?= $report->nome ?></b> do grupo <b><?= $grupo->nome ?></b>
                        </div>
                        <div class='panel-body'>
                            <div class="col-lg-8" style="overflow: auto; max-height: 200px; min-height:200px;">
                                <?= $report->content ?>
                            </div>
                            <div class="col-lg-4 text-center">
                                <a data-toggle="modal" data-target="#edit_report_<?= $report->id ?>">
                        			 <button id="new_student_group" type="button" class="btn btn-warning btn-circle">
                        			      <i class="fa fa-pencil"></i>
                        			 </button>
                    			 </a>
                                <a href='<?= base_url("admin/grupos/reports/deletar/".$grupo->id."/".$report->id) ?>'>
                        			 <button type="button" class="btn btn-danger btn-circle confirmation">
                        			      <i class="fa fa-times"></i>
                        			 </button>
                    			 </a>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
</div>