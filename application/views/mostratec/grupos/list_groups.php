<?php $this->load->view("includes/header");//carregamos o header e o menu da pagina ?>
    
        <!-- Page Content -->
        <div class="container">
            <div class="row">
                <div class="col-lg-8 well">
                    <nav class="breadcrumb" style="margin-bottom: 0px;">
                        <a class="breadcrumb-item" href="<?= base_url() ?>">
                            Home
                        </a>
                        <span class="breadcrumb-item active">
                           / Grupos
                        </span>
                    </nav>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-8 well clearfix">
                    <div class="text-center">
                        <h1>Grupos</h1>
                    </div>
                    <div id="groups">
                        <?php if(isset($my_groups) && !isset($logged)){ ?>
                        <br>
                            <?php// if(1 == 1){ ?>
                            <div class="panel panel-primary">
                                <div class="panel-heading">
                                    Meus Grupos
                                </div>
                                <div class="panel-body">
                                    <div class="panel-group" id="mygroup">
                                <!-- .panel-heading -->
                                <?php foreach($my_groups as $grupo){ ?>
                                    <?php if(isset($grupo->have_group) && $grupo->have_group != null){ ?>
                                       <div class="panel panel-default">
                                           <a data-toggle="collapse" data-parent="#mygroup" href="<?= '#collapse_'.$grupo->id ?>">
                                                <div class="panel-heading">
                                                    <h4 class="panel-title">
                                                        <?= $grupo->nome ?>
                                                            <?= (is_moderator($grupo->id) || is_admin() ? "<p class='btn btn-warning btn-xs' style='float:right;'>Moderador</p>" : "") ?>
                                                    </h4>
                                                </div>
                                            </a>
                                        <div id="<?= 'collapse_'.$grupo->id ?>" class="panel-collapse collapse">
                                            <div class="panel-body">
                                                <div class="col-lg-8">
                                                  <?= $grupo->description ?>
                                                 </div>
                                                 <!--<div class="form-group">-->
                                                        <a href="<?= base_url('grupos/posts/'.$grupo->id) ?>">
                                                            <button class="btn btn-info btn-sm">Posts</button>
                                                        </a>
                                                        <?php if($grupo->active != 0 && $grupo->closed != 1){ ?>
                                                            <a href="<?= base_url('grupos/relatorios/'.$grupo->id) ?>">
                                                                <button class="btn btn-success btn-sm">Relatórios</button>
                                                            </a>
                                                            <a data-toggle="modal" data-target="<?= '#new_group_post_'.$grupo->id ?>">
                                                                <button class="btn btn-default btn-sm">Novo Post</button>
                                                            </a>
                                                        <?php } ?>
                                                 <!--</div>-->
                                            </div>
                                        </div>
                                    </div>
                                <?php 
                                    } //end if
                                    } //end foreach ?>
                                    </div>
                                </div>
                                <!-- .panel-body -->
                            </div>
                            <?php // }//end meus grupos ?>    
                            <!-- /.panel -->
                        <?php } ?>
                        <hr>
                        <?php if(isset($my_groups)){ ?>
                            <div class="panel panel-primary">
                                <div class="panel-heading">
                                    Todos os Grupos
                                </div>
                                <div class="panel-body">
                                    <div class="panel-group" id="mygroup">
                                <!-- .panel-heading -->
                                <?php foreach($my_groups as $grupo){ ?>
                                    <?php if(!isset($grupo->have_group)){ ?>
                                       <div class="panel panel-default">
                                           <a data-toggle="collapse" data-parent="#other_groups" href="<?= '#collapse_'.$grupo->id ?>">
                                                <div class="panel-heading">
                                                    <h4 class="panel-title">
                                                        <?= $grupo->nome ?>
                                                        <?= (is_moderator($grupo->id) || is_admin() ? "<p class='btn btn-info btn-xs' style='float:right;'>Moderador</p>" : "") ?>
                                                    </h4>
                                                </div>
                                            </a>
                                        <div id="<?= 'collapse_'.$grupo->id ?>" class="panel-collapse collapse">
                                            <div class="panel-body">
                                                <div class="col-lg-8">
                                                  <?= $grupo->description ?>
                                                 </div>
                                                        <a href="<?= base_url('grupos/posts/'.$grupo->id) ?>">
                                                            <button class="btn btn-info btn-sm">Posts</button>
                                                        </a>
                                                        <?php if(is_moderator($grupo->id) && $grupo->active != 0 && $grupo->closed != 1){ ?>
                                                        <a href="<?= base_url('grupos/relatorios/'.$grupo->id) ?>">
                                                            <button class="btn btn-success btn-sm">Relatórios</button>
                                                        </a>
                                                        <a data-toggle="modal" data-target="<?= '#new_group_post_'.$grupo->id ?>">
                                                            <button class="btn btn-default btn-sm">Novo Post</button>
                                                        </a>
                                                        <?php } ?>
                                            </div>
                                        </div>
                                    </div>
                                <?php } //end if
                                    } //end foreach ?>
                                </div>
                            </div>
                            <!-- .panel-body -->
                        </div>
                        <!-- /.panel -->
                        <?php } ?>
                    </div>
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
                $("#my_groups").accordion();
                
                $("#other_groups").accordion();
                
            });
    </script>
    <?php 
        foreach($my_groups as $grupo)
        {
            if((isset($grupo->have_group) && $grupo->have_group != null) || is_moderator($grupo->id) || is_admin())
            {
                print_new_post_modal($grupo);//gera modal de novo post
            }
        }
                
    ?>