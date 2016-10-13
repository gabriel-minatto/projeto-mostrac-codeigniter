<?php $this->load->view("includes/header");//carregamos o header e o menu da pagina ?>
    
        <!-- Page Content -->
        <div class="container">
            <div class="row">
                <div class="col-lg-8 well">
                    <div class="text-center">
                        <h1>Grupos</h1>
                    </div>
                    <div id="groups">
                        <?php if(isset($my_groups) && !isset($logged)){ ?>
                        <hr>
                        <label>Meus Grupos</label>
                            <div id="my_groups">
                                <?php foreach($my_groups as $grupo){ ?>
                                        <h3><?= $grupo->nome ?></h3>
                                        <div class="panel">
                                            <div class="col-lg-8">
                                          <p><?= $grupo->description ?></p>
                                             </div>
                                             <div class="col-lg-2">
                                                <a href="<?= base_url('grupos/posts/'.$grupo->id) ?>">
                                                    <button class="btn btn-default btn-lg">Posts</button>
                                                </a>
                                             </div>
                                             <div class="col-lg-2">
                                                <a href="<?= base_url('grupos/relatorios/'.$grupo->id) ?>">
                                                    <button class="btn btn-default btn-lg">Relatórios</button>
                                                </a>
                                             </div>
                                        </div>
                                <?php } ?>
                            </div>
                        <?php } ?>
                        <hr>
                        <?php if(isset($other_groups)){ ?>
                        <label>Todos os Grupos</label>
                            <div id="other_groups">
                                 <?php foreach($other_groups as $grupo){ ?>
                                        <h3><?= $grupo->nome ?></h3>
                                        <div class="panel">
                                            <div class="col-lg-8">
                                          <p><?= $grupo->description ?></p>
                                             </div>
                                             <div class="col-lg-2">
                                                <a href="<?= base_url('grupos/posts/'.$grupo->group_id) ?>">
                                                    <button class="btn btn-default btn-lg">Posts</button>
                                                </a>
                                             </div>
                                             <!--<div class="col-lg-2">-->
                                             <!--   <a href="<?=""// base_url('grupos/relatorios/'.$grupo->id) ?>">-->
                                             <!--       <button class="btn btn-default btn-lg">Relatórios</button>-->
                                             <!--   </a>-->
                                             <!--</div>-->
                                        </div>
                                <?php } ?>
                            </div>
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