<?php $this->load->view("includes/header");//carregamos o header e o menu da pagina ?>
    
        <!-- Page Content -->
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="well">
                        <div class="text-center">
                            <h1>Relatórios</h1>
                        </div>
                        <hr>
                        <div id="reports">
                            <?php if(isset($relatorios) && !empty($relatorios)){ ?>
                                <div id="my_reports">
                                    <?php foreach($relatorios as $relatorio){ ?>
                                            <h3><?= $relatorio->relat_nome ?></h3>
                                            <div class="panel">
                                                <div class="col-lg-10">
                                              <p><?= $relatorio->relatorio ?></p>
                                                 </div>
                                            </div>
                                    <?php } ?>
                                </div>
                            <?php }else{ ?>
                            Ainda não existem relatórios para este grupo.
                            <?php } ?>
                        </div>
                    </div>
                    <?php if(isset($comentarios)){ ?>
                        <!-- Posted Comments -->
                        <div id='report_coments'>
                            <?php foreach($comentarios as $comentario){ ?>
                            <!-- Comment -->
                            <div class="well media">
                                <a class="pull-left" href="#">
                                    <img class="media-object" src="http://placehold.it/64x64" alt="">
                                </a>
                                <div class="media-body">
                                    <h4 class="media-heading"><?= $comentario->nome ?></font>
                                        <small><?= mdate('%d/%m/%Y as %H:%i',strtotime($comentario->coment_date)) ?></small>
                                    </h4>
                                    <?= $comentario->recado ?>
                                    </font>
                                </div>
                            </div>
                            <?php } ?>
                        </div>
                        <a class='btn btn-default btn-block' id='toggle_coments'>Ver/Esconder Comentários</a>
                    <?php } ?>
                    <br>
                    <!-- Comments Form -->
                    <div class="well">
                        <h4>Deixe um comentário:</h4>
                        <form role="form" method="POST" action="<?= base_url('grupos/relatorios/salvar/comentario/'.$group) ?>">
                            <div class="form-group">
                                <textarea class="form-control" rows="3" name="comentario"></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary">Salvar</button>
                        </form>
                    </div>
                    <hr>
                </div>
                <!-- Blog Sidebar Widgets Column -->
                <div class="col-md-4">
                    <!-- Blog Search Well -->
                    <div class="well">
                        <h4>Pesquisar</h4>
                        <div class="input-group">
                            <input type="text" class="form-control">
                            <span class="input-group-btn">
                                <button class="btn btn-default" type="button">
                                    <span class="glyphicon glyphicon-search"></span>
                            </button>
                            </span>
                        </div>
                        <!-- /.input-group -->
                    </div>
    
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
            <!-- /.row -->
    
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