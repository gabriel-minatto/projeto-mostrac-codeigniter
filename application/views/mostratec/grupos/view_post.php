<?php $this->load->view("includes/header");//carregamos o header e o menu da pagina ?>

    <!-- Page Content -->
    <div class="container">

        <div class="row">

            <!-- Blog Post Content Column -->
            <div class="col-lg-8">

                <!-- Title -->
                <h1><font color="white"><?= $post->title ?></font></h1>

                <!-- Author -->
                <p class="lead"><font color="white">
                    by <?= $autor->nome ?></font>
                </p>

                <hr>

                <!-- Date/Time -->
                <p><span class="glyphicon glyphicon-time"></span><font color="white"><?= mdate('Postado em %d/%m/%Y as %H:%i',strtotime($post->date)) ?></font></p>

                <hr>

                <!-- Post Content -->
				<div class='well'>
				    <?php if($post->video){ ?>
    				    <div class="col-sm-6">
                            <div class="embed-responsive embed-responsive-16by9">
                                <iframe class="embed-responsive-item" src="<?= $post->video ?>" allowfullscreen></iframe>
                            </div>
                        </div>
                    <?php } ?>
                    
                    <?= $post->content ?>
                    
                    <?php if($post_images){ ?>
                        <div id="carousel-example-generic" class="carousel slide">
                            <!-- Indicators -->
                            <ol class="carousel-indicators hidden-xs">
                                <?php
                                $i=0;
                                for($i=0;$i<sizeof($post_images);$i++){ ?>
                                <li data-target="#carousel-example-generic" data-slide-to="<?=$i?>" <?= ($i==0) ? "class='active'" : "" ?>></li>
                                <?php } ?>
                            </ol>
    
                            <!-- Wrapper for slides -->
                            <div class="carousel-inner">
                                <?php
                                $i=0;
                                for($i=0;$i<sizeof($post_images);$i++){ ?>
                                <div class="<?= ($i==0) ? 'item active' : "item" ?>">
                                    <img class="img-responsive img-full" src="<?= base_url('uploads/groups/pictures/'.$post_images[$i]->nome)?>" alt="">
                                </div>
                                <?php } ?>
                            </div>
    
                            <!-- Controls -->
                            <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
                                <span class="icon-prev"></span>
                            </a>
                            <a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
                                <span class="icon-next"></span>
                            </a>
                        </div>
                    <?php } ?>
				</div>
                <hr>

                <?php if($post_coments){ ?>
                    <!-- Posted Comments -->
                    <div id='post_coments'>
                        <?php foreach($post_coments as $coment){ ?>
                        <!-- Comment -->
                        <div class="well media">
                            <a class="pull-left" href="#">
                                <img class="media-object" src="http://placehold.it/64x64" alt="">
                            </a>
                            <div class="media-body">
                                <h4 class="media-heading"><?= $coment->nome ?></font>
                                    <small><?= mdate('%d/%m/%Y as %H:%i',strtotime($coment->date)) ?></small>
                                </h4>
                                <?= $coment->text ?>
                                </font>
                            </div>
                        </div>
                        <?php } ?>
                    </div>
                    <a class='btn btn-default btn-block' id='toggle_coments'>Ver/Esconder Comentários</a>
                    <hr>
                <?php } ?>
                
                <?php if(!isset($logged)){ ?>
                    <!-- Comments Form -->
                    <div class="well">
                        <h4>Deixe um comentário:</h4>
                        <form role="form" method="POST" action="<?= base_url('grupos/posts/view/salvar-comentario/'.$post->id) ?>">
                            <div class="form-group">
                                <textarea class="form-control" rows="3" name="comentario"></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary">Salvar</button>
                        </form>
                    </div>
                <?php } ?>
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

        <hr>

    <?php $this->load->view("includes/footer"); ?>
    <script>
        $(document).ready(
            function()
            {
                $("#post_coments").hide();
                $("#toggle_coments").click(
                    function()
                    {
                        $("#post_coments").toggle("slow");
                    });
            });
    </script>

