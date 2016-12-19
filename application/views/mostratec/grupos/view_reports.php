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
                                <span class="breadcrumb-item active">
                                    / Relatórios - <?= $group->nome ?>
                                </span>
                            </nav>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12 well clearfix">
                                    <?php if(isset($relatorios) && !empty($relatorios)){ ?>
                                    <div class="panel panel-primary">
                                        <div class="panel-heading">
                                            Relatórios
                                        </div>
                                        <div class="panel-body">
                                            <div class="panel-group" id="reports">
                                        <!-- .panel-heading -->
                                            <?php foreach($relatorios as $relatorio){ ?>
                                                <div class="panel panel-default">
                                                   <a data-toggle="collapse" data-parent="#reports" href="<?= '#collapse_'.$relatorio->id ?>">
                                                        <div class="panel-heading">
                                                            <h4 class="panel-title">
                                                                <?= $relatorio->nome ?>
                                                            </h4>
                                                        </div>
                                                    </a>
                                                    <div id="<?= 'collapse_'.$relatorio->id ?>" class="panel-collapse collapse">
                                                        <div class="panel-body">
                                                            <div class="col-lg-9">
                                                              <?= $relatorio->content ?>
                                                             </div>
                                                             <a href="<?= base_url('/grupos/relatorios/discutir/'.$relatorio->id.'/'.$relatorio->group) ?>">
                                                                 <div class="col-lg-2">
                                                                     <button class="btn btn-info">Discussão</button>
                                                                </div>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                        <?php } //end foreach ?>
                                            </div>
                                        </div>
                                    <!-- .panel-body -->
                                    </div>
                                <!-- /.panel -->
                                    <?php }else{ ?>
                                    Ainda não existem relatórios para este grupo.
                                    <?php } ?>
                        </div>
                    </div>
                <!--    <div class="row">-->
                <!--        <?php //if(isset($comentarios)){ ?>-->
                            <!-- Posted Comments -->
                <!--            <div id='report_coments'>-->
                <!--                <?php //foreach($comentarios as $comentario){ ?>-->
                                <!-- Comment -->
                <!--                <div class="well media">-->
                <!--                    <a class="pull-left" href="#">-->
                <!--                        <img class="media-object" src="http://placehold.it/64x64" alt="">-->
                <!--                    </a>-->
                <!--                    <div class="media-body">-->
                <!--                        <h4 class="media-heading"><//?= $comentario->nome ?></font>-->
                <!--                            <small><//?= mdate('%d/%m/%Y as %H:%i',strtotime($comentario->coment_date)) ?></small>-->
                <!--                        </h4>-->
                <!--                        <//?= //$comentario->recado ?>-->
                <!--                        </font>-->
                <!--                    </div>-->
                <!--                </div>-->
                <!--                <?php //} ?>-->
                <!--            </div>-->
                <!--            <a class='btn btn-default btn-block' id='toggle_coments'>Ver/Esconder Comentários</a>-->
                <!--        <?php //} ?>-->
                <!--        <br>-->
                        <!-- Comments Form -->
                <!--        <div class="well">-->
                <!--            <h4>Deixe um comentário:</h4>-->
                <!--            <form role="form" method="POST" action="<//?=// base_url('grupos/relatorios/salvar/comentario/'.$group->id) ?>">-->
                <!--                <div class="form-group">-->
                <!--                    <textarea class="form-control" rows="3" name="comentario"></textarea>-->
                <!--                </div>-->
                <!--                <button type="submit" class="btn btn-primary">Salvar</button>-->
                <!--            </form>-->
                <!--        </div>-->
                <!--        <hr>-->
                <!--</div>-->
            </div>
                <!-- Blog Sidebar Widgets Column -->
                <div class="col-md-4">
    
                    <!-- Blog Categories Well -->
                    <div class="well">
                        <h4>Posts do Grupo</h4>
                        <div class="row">
                            <div class="col-lg-6">
                                <ul class="list-unstyled">
                                    <?php foreach ($group_posts as $post_link) { ?>
                                    <li><a href="<?= base_url('grupos/posts/view/'.$post_link->id) ?>"><?= $post_link->title ?></a></li>
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
        $(document).ready(
            function()
            {
                $("#my_reports").accordion();
                
                $("#report_coments").hide();
                $("#toggle_coments").click(
                    function()
                    {
                        $("#report_coments").toggle("slow");
                    });
                
            });
    </script>