<?php $this->load->view("includes/header");//carregamos o header e o menu da pagina ?>
    <div class="container">

        <div class="row">
            <div class="box">
                <div class="col-lg-12">
                    <hr>
                    <h2 class="intro-text text-center">Mostratec
                        <strong>blog</strong>
                    </h2>
                    <hr>
                </div>
                <?php foreach($posts as $post){ ?>
                <div class="col-lg-12 text-center">
                    <img class="img-responsive img-border img-full" src="<?= base_url()?>uploads/home/img/<?= isset($post->image) ? $post->image : 'slide-1.jpg' ?>" alt="">
                    <h2><?= $post->title ?>
                        <br>
                        <small><?= $post->data ?></small>
                    </h2>
                    <p><?= $post->description ?></p>
                    <a href="<?= base_url('blog/postagens/'.$post->id) ?>" class="btn btn-default btn-lg">Leia Mais</a>
                    <hr>
                </div>
                <?php } ?>
                
                <div class="col-lg-12 text-center">
                    <ul class="pager">
                        <li class="previous"><a href="#">&larr; Older</a>
                        </li>
                        <li class="next"><a href="#">Newer &rarr;</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

    </div>
    <!-- /.container -->
    
    <?php $this->load->view("includes/footer"); ?>
    
