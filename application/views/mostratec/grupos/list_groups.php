<?php $this->load->view("includes/header");//carregamos o header e o menu da pagina ?>
    
        <!-- Page Content -->
        <div class="container">
    
            <div class="row">
                
                <div class="col-lg-8 well">
                    
                    <div class="text-center">
                        <h1>Grupos</h1>
                    </div>
                    <hr>
                    
                    <div id="groups">
                        <?php// foreach($grupos as $grupo){ ?>
                            <div class="col-lg-3 col-sm-6">
                                <div class="panel panel-default" style="min-height: 267px;">
                                    <a>
                                        <div class="panel-heading text-center">
                                            <span style="font-size:5em;" class="<?="1"// $grupo['icone']; ?>"></span>
                                        </div>
                                    </a>
                                    <div class="panel-body" style="min-height: 150px;">
                                        <div class="col-md-12 text-center bold" style="min-height: 66px;">
                                            <p><?="1"// $grupo["nome_grupo"] ?></p>
                                        </div>
                                        <div class="col-md-6 text-center" style="font-size: 16px; padding-top: 20px;">
                                            <div class="col-md-3" style="padding: 0px;">
                                                <button class="btn btn-danger glyphicon glyphicon-remove delete_group_button" id="<?="1" //$grupo["id_grupo"] ?>"></button>
                                            </div>
                                        </div>
                                        <div class="col-md-6 text-center" style="font-size: 16px; padding-top: 20px;">
                                            <div class="col-md-3" style="padding: 0px;">
                                                <button class="btn btn-info glyphicon glyphicon-pencil edit_group_button"></button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php// } ?>
                    </div>
                    
                    <button type="button" class="btn btn-default btn-lg" id="update_groups">
                        <span class="glyphicon glyphicon-refresh"></span>
                    </button>
                    
                    <a type="button" class="btn btn-default btn-lg" id="new_group" data-fancybox-type="iframe" href="includes/forms/group_form.html">
                        <span class="glyphicon glyphicon-plus"></span>
                    </a>
                    
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
                        <h4>Posts</h4>
                        <div class="row">
                            <div class="col-lg-6">
                                <ul class="list-unstyled">
                                    <li>
                                        <a href="#">grupo 1</a>
                                    </li>
                                    <li>
                                        <a href="#">grupo 2</a>
                                    </li>
                                    <li>
                                        <a href="#">grupo 4</a>
                                    </li>
                                    <li>
                                        <a href="#">grupo 5</a>
                                    </li>
                                    <li>
                                        <a href="#">Category Name</a>
                                    </li>
                                    <li>
                                        <a href="#">Category Name</a>
                                    </li>
                                    <li>
                                        <a href="#">Category Name</a>
                                    </li>
                                    <li>
                                        <a href="#">Category Name</a>
                                    </li>
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
    
            <!-- Footer -->
            <footer>
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12 text-center">
                            <p>Copyright &copy; Projeto Mostratec de Iniciação Científica</p>
                        </div>
                    </div>
                </div>
            </footer>
    
        </div>
     
    <?php $this->load->view("includes/footer_sources"); ?>
    
</body>

</html>