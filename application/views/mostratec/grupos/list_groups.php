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
                        <?php foreach($grupos as $grupo){ ?>
                                <h3><?= $grupo->nome ?></h3>
                                <div class="panel">
                                    <div class="col-lg-10">
                                  <p><?= $grupo->description ?></p>
                                     </div>
                                     <div class="col-lg-2">
                                        <a href="<?= base_url('grupos/posts/'.$grupo->id) ?>">
                                            <button class="btn btn-default btn-lg">Abrir</button>
                                        </a>
                                     </div>
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
     
    <?php $this->load->view("includes/footer"); ?>
    <script>
        $(document).ready(
            function()
            {
                $("#groups").accordion();
                
            });
    </script>