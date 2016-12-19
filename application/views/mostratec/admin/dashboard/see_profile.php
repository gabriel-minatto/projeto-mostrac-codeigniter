<?php 
// var_dump($this->session); exit;
$this->load->view("mostratec/admin/includes/header");//carregamos o header e o menu da pagina ?>

    <!--<div class="container">-->
        <div class='row'>
            <div class="col-lg-12">
                <h1>Nome:</h1>
                <h3><?= $perfil->nome ?></h3>
            </div>
        </div>
        <div class='row'>
            <div class="col-lg-10">
                <h1>Email:</h1>
                <h3><?= $perfil->email ?></h3>
            </div>
        </div>
        <div class='row'>
            <div class="col-lg-10">
                <h1>Tipo:</h1>
                <h3>
                    <?php if($perfil->type == 'teacher'){ ?>
                        <h3>Professor</h3><?php }else if($perfil->type == 'admin'){ ?>
                            <h3>Administrador</h3>
                    <?php }else{ ?>
                                <h3>Super Usuário</h3>
                    <?php } ?>
                </h3>
            </div>
        </div>
        <div class='row'>
            <div class="col-lg-10">
                <h1>Código:</h1>
                <h3><?= $perfil->code ?></h3>
            </div>
        </div>
    <!--</div>                -->

<?php $this->load->view("mostratec/admin/includes/footer");//carregamos o header e o menu da pagina ?>