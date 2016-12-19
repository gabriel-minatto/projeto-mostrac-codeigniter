<?php $this->load->view("includes/header");//carregamos o header e o menu da pagina ?>
    
    <!-- Page Content -->
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="row">
                    <div class="col-lg-12 well">
                        <nav class="breadcrumb" style="margin-bottom: 0px;">
                            <a class="breadcrumb-item" href="<?= base_url() ?>">
                                Home
                            </a>
                            <a class="breadcrumb-item" href="<?= base_url('grupos/home') ?>">
                               / Grupos
                            </a>
                            <a class="breadcrumb-item" href="<?= base_url('/grupos/relatorios/'.$group->id) ?>">
                                / Relatórios - <?= $group->nome ?>
                            </a>
                            <span class="breadcrumb-item active">
                                / Relatório - <?= $relatorio->nome ?>
                            </span>
                        </nav>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12 well clearfix">
                        <?php if(isset($comentarios) && !empty($comentarios)){ ?>
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                Discussão - <?= $relatorio->nome ?>
                            </div>
                            <div class="panel-body">
                                <div class="panel-group" id="report_coments">
                            <!-- .panel-heading -->
                                <?php foreach($comentarios as $comentario){ ?>
                                    <div class="panel panel-default">
                                       <a data-toggle="collapse" data-parent="#report_coments" href="<?= '#collapse_'.$comentario->id ?>">
                                            <div class="panel-heading">
                                                <h4 class="panel-title">
                                                    <?= $comentario->nome ?>
                                                </h4>
                                            </div>
                                        </a>
                                        <div id="<?= 'collapse_'.$comentario->id ?>" class="panel-collapse collapse">
                                            <div class="panel-body">
                                                <div class="col-lg-10">
                                                    <?= $comentario->recado ?>
                                                </div>
                                                <?php if($comentario->user == $this->session->user_id || is_moderator($group->id)){ ?>
                                                    <div class="col-lg-2">
                                                        <a href="<?= base_url('grupos/relatorios/excluir/comentario/'.$comentario->id.'/'.$group->id) ?>">
                                                            <button type="button" class="btn btn-danger btn-circle btn-xs confirmation pull-right">
                                                                <i class="fa fa-times"></i>
                                                            </button>
                                                        </a>
                                                    </div>
                                                <?php } ?>
                                            </div>
                                        </div>
                                        <div class='panel-footer'>
                                            Postado em <?= sql_date_to_br_with_time($comentario->coment_date) ?>
                                        </div>
                                    </div>
                            <?php } //end foreach ?>
                                </div>
                            </div>
                            <!-- .panel-body -->
                        </div>
                        <?php } ?>
                        <!-- /.panel -->
                        <form role="form" method="POST" id='coment_form' action="<?= base_url('grupos/relatorios/salvar/comentario/'.$relatorio->id.'/'.$group->id) ?>">
                            <div class="form-group">
                                <textarea class="form-control" rows="3" name="comentario"></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary">Enviar</button>
                        </form>
                    </div>
                   
                </div>
        </div>
            <!-- Blog Sidebar Widgets Column -->
            <div class="col-md-4">
                <!-- Blog Categories Well -->
                <div class="well">
                    <h4>Relatórios do Grupo</h4>
                    <div class="row">
                        <div class="col-lg-6">
                            <ul class="list-unstyled">
                                <?php foreach ($relatorios_grupo as $relatorio_grupo) { ?>
                                <li><a href="<?= base_url('grupos/relatorios/discutir/'.$relatorio_grupo->id.'/'.$group->id) ?>"><?= $relatorio_grupo->nome ?></a></li>
                                <?php } ?>
                            </ul>
                        </div>
                    </div>
                    <!-- /.row -->
                </div>
                <!-- Side Widget Well -->
                <div class="well">
                    <h4>Side Widget Well</h4>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Inventore, perspiciatis adipisci accusamus laudantium odit aliquam repellat tempore quos aspernatur vero.</p>
                </div>

            </div>
        </div>
    </div>
<?php $this->load->view("includes/footer"); ?>
<script>
    $("#coment_form").keypress(function(tecla)
    {
        if(tecla.which == 13)
        {
            $("#coment_form").submit();
        }
    });
</script>