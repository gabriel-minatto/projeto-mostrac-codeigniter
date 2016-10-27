<?php $this->load->view("includes/header");//carregamos o header e o menu da pagina ?>
    <div class="container">
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
                        / <?= $group->nome ?>
                    </span>
                </nav>
            </div>
        </div>
        <div class="row">
            <div class="box">
                    
                <div class="col-lg-12">
                    <hr>
                    <h2 class="intro-text text-center">
                        <strong><?= $group->nome ?></strong>
                    </h2>
                    <hr>
                </div>
            <?php if(isset($cover) && !empty($cover)){ ?>
                <div class="col-lg-10 col-lg-offset-1 text-center">
                    <img class="img-responsive img-border img-full" src="<?= base_url('uploads/groups/posts/'.string_to_slug($cover->title)."_".$cover->id."/cover/".$cover->image)?>" alt="">
                    <h2><?= $cover->title ?>
                        <br>
                        <small><?= sql_date_to_br($cover->date) ?></small>
                    </h2>
                    <p><?= $cover->description ?></p>
                    <?php if(!isset($logged) && is_author($cover->id,$cover->group)){ ?>
                            <a data-toggle="modal" data-target="#edit_group_post_<?= $cover->id ?>" class="btn btn-info btn-lg">Editar</a>
                    <?php } ?>
                    <a href="<?= base_url('grupos/posts/view/'.$cover->id) ?>" class="btn btn-default btn-lg">Leia Mais</a>
                    <hr>
                </div>
            <?php }
                 if(isset($posts) && !empty($posts)){
                     foreach($posts as $post){ ?>
                        <div class="col-lg-6 col-lg-offset-3 text-center">
                            <img class="img-responsive img-border img-full" src="<?= base_url('uploads/groups/posts/'.string_to_slug($post->title).'_'.$post->id.'/cover/'.$post->image)?>" alt="">
                            <h2><?= $post->title ?>
                                <br>
                                <small><?= sql_date_to_br($post->date) ?></small>
                            </h2>
                            <p><?= $post->description ?></p>
                                <?php if(!isset($logged) && is_author($post->id,$post->group)){ ?>
                                    <a data-toggle="modal" data-target="#edit_group_post_<?= $post->id ?>" class="btn btn-info btn-lg">Editar</a>
                                <?php } ?>
                                <a href="<?= base_url('grupos/posts/view/'.$post->id) ?>" class="btn btn-default btn-lg">Leia Mais</a>
                                <hr>
                        </div>
                <?php } 
                 }else{ ?>
                 Este grupo ainda não possui postagens ;(
                 <?php } ?>
            </div>
        </div>

    </div>
    <!-- /.container -->
    
    <?php $this->load->view("includes/footer"); ?>
    <?php
    if(isset($cover) && !empty($cover))
    {
        print_edit_post_modal($cover);
    }
    if(isset($posts) && !empty($posts))
    {
        foreach($posts as $post)
        {
            print_edit_post_modal($post);
        }
    }                
    
    ?>
    
