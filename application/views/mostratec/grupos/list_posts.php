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
                <div class="col-lg-10 col-lg-offset-1 text-center">
                    <img class="img-responsive img-border img-full" src="<?= base_url('uploads/home/img/'.$cover->image)?>" alt="">
                    <h2><?= $cover->title ?>
                        <br>
                        <small><?= sql_date_to_br($cover->date) ?></small>
                    </h2>
                    <p><?= $cover->description ?></p>
                    <a href="<?= base_url('grupos/posts/view/'.$cover->id) ?>" class="btn btn-default btn-lg">Leia Mais</a>
                    <hr>
                </div>
                <?php foreach($posts as $post){
                ?>
                <div class="col-lg-6 col-lg-offset-3 text-center">
                    <img class="img-responsive img-border img-full" src="<?= base_url('uploads/home/img/'.$post->image)?>" alt="">
                    <h2><?= $post->title ?>
                        <br>
                        <small><?= sql_date_to_br($post->date) ?></small>
                    </h2>
                    <p><?= $post->description ?></p>
                    <a href="<?= base_url('grupos/posts/view/'.$post->id) ?>" class="btn btn-default btn-lg">Leia Mais</a>
                    <hr>
                </div>
                <?php } ?>
            </div>
        </div>

    </div>
    <!-- /.container -->
    
    <?php $this->load->view("includes/footer"); ?>
    
