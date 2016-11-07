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
        <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <?= $grupo->nome ?>
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <!-- Nav tabs -->
                            <ul class="nav nav-tabs">
                                
                                <?php if(empty($this->session->flashdata("selected_tab"))){  ?>
                                        <li class="active"><a href="#alunos" data-toggle="tab">Alunos</a></li>
                                <?php }else{ ?>
                                        <li><a href="#alunos" data-toggle="tab">Alunos</a></li>
                                <?php } ?>
                                
                                <?php if($this->session->flashdata("selected_tab") == "posts"){  ?>
                                        <li class="active"><a href="#posts" data-toggle="tab">Posts</a></li>
                                <?php }else{ ?>
                                        <li><a href="#posts" data-toggle="tab">Posts</a></li>
                                <?php } ?>
                                
                                <?php if($this->session->flashdata("selected_tab") == "relatorios"){  ?>
                                        <li class="active"><a href="#relatorios" data-toggle="tab">Relatórios</a></li>
                                <?php }else{ ?>
                                        <li><a href="#relatorios" data-toggle="tab">Relatórios</a></li>
                                <?php } ?>
                                
                                <?php if($this->session->flashdata("selected_tab") == "moderadores"){  ?>
                                        <li class="active"><a href="#moderadores" data-toggle="tab">Moderadores</a></li>
                                <?php }else{ ?>
                                        <li><a href="#moderadores" data-toggle="tab">Moderadores</a></li>
                                <?php } ?>
                                
                            </ul><!-- ativa a aba de acordo com o flashdata selected tab ou deixa alunos por default -->

                            <!-- tab de alunos -->
                            <div class="tab-content">
                                
                                <?php $this->load->view("mostratec/admin/includes/group_manage/student",array('alunos'=>$alunos,'group'=>$grupo)); ?>
                                
                                <?php $this->load->view("mostratec/admin/includes/group_manage/posts",array('posts'=>$posts,'group'=>$grupo)); ?>
                                
                                <?php $this->load->view("mostratec/admin/includes/group_manage/reports",array('reports'=>$reports,'group'=>$grupo)); ?>
                                
                                <?php $this->load->view("mostratec/admin/includes/group_manage/moderators",array('alunos'=>$moderators,'group'=>$grupo)); ?>
                                
                            </div>
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
    </div>
<!-- /.row -->
<?php $this->load->view("mostratec/admin/includes/footer");//carregamos o header e o menu da pagina ?>

<div id="add_student_to_group_modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="add_student_to_group_label" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="add_student_to_group_label">Adicionar Aluno ao grupo <?= $grupo->nome ?></h4>
      </div>
      <div id="add_student_to_group_modal_body" class="modal-body">
          <div class="container-fluid bd-example-row">
            </div>
      </div>
      <div class="modal-footer">
        <div class="form-group">
            <button class="btn btn-secondary close_modal"  data-dismiss="modal">Fechar</button>
            <button id="add_student_to_group_submit" type="submit" name="submit" class="btn btn-primary">Salvar</button>
        </div>
      </div>
    </div>
  </div>
</div>

<?php print_add_report_modal($grupo);

foreach($reports as $report)
{
    print_edit_report_modal($grupo,$report);
}
?>

<script>
    //load_add_student_to_group
    $("#new_student_group").click(
        function()
        {
            $("#student_to_group_filter,#student_field").block({message:"Processando, aguarde..."});
            $(".modal-footer button").block({message:""});
            dataform = {grupo:"<?= $grupo->id ?>"};
            $.post("<?= base_url('admin/grupos/alunos/carregar-add-form') ?>",dataform)
            .done(
                function(form)
                {
                    $("#student_to_group_filter,#student_field, button").unblock();
                    $("#add_student_to_group_modal_body div").html(form);
                });
        });
</script>