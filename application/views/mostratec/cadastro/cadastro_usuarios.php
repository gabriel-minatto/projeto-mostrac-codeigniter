<?php $this->load->view("includes/header");//carregamos o header e o menu da pagina ?>

    <div class="container">

        <div class="row">
            <div class="box">
                <div class="col-lg-12">
                    <hr>
                    <h2 class="intro-text text-center">Formulário de
                        <strong>cadastro</strong>
                    </h2>
                    <hr>
                    <form class="form-horizontal" action="../controllers/cadastro_controller.php" method="post">
                        <fieldset>
                            
                            <!-- Text input-->
                            <div class="form-group">
                              <label class="col-md-4 control-label" for="nome">Nome:</label>  
                              <div class="col-md-4">
                              <input id="nome" name="nome" type="text" placeholder="nome completo" class="form-control input-md" required="">
                                
                              </div>
                            </div>
                            
                            <!-- Text input-->
                            <div class="form-group">
                              <label class="col-md-4 control-label" for="senha">Senha:</label>  
                              <div class="col-md-4">
                              <input id="senha" name="senha" type="password" placeholder="senha" class="form-control input-md" required="">
                                
                              </div>
                            </div>
                            
                            <!-- Text input-->
                            <div class="form-group">
                              <label class="col-md-4 control-label" for="email">Email:</label>  
                              <div class="col-md-4">
                              <input id="email" name="email" type="email" placeholder="digite seu email" class="form-control input-md" required="">
                                
                              </div>
                            </div>
                            
                            <!-- Text input-->
                            <div class="form-group">
                              <label class="col-md-4 control-label" for="dt_nasc">Data de Nascimento:</label>  
                              <div class="col-md-4">
                              <input id="dt_nasc" name="dt_nasc" type="date" placeholder="" class="form-control input-md" required="">
                                
                              </div>
                            </div>
                            
                            <!-- Select Basic -->
                            <div class="form-group">
                              <label class="col-md-4 control-label" for="instituicao">Instituição:</label>
                              <div class="col-md-4">
                                <select id="instituicao" name="instituicao" class="form-control">
                                  <option value="1">1</option>
                                </select>
                              </div>
                            </div>
                            
                             <!-- Button (Double) -->
                            <div class="form-group">
                              <label class="col-md-4 control-label"></label>
                              <div class="col-md-4">
                                <button type="submit" id="submit" class="btn btn-default">Cadastrar</button>
                                <button type="reset" id="reset" class="btn btn-info">Limpar</button>
                              </div>
                            </div>
                        
                        </fieldset>
                    </form>

                </div>
            </div>
        </div>

    </div>
    <!-- /.container -->

    <footer>
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <p>Copyright &copy; Projeto Mostratec de Iniciação Científica</p>
                </div>
            </div>
        </div>
    </footer>

   <!-- jQuery -->
    <script src="../../temas/index/js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../../temas/index/js/bootstrap.min.js"></script>
    
    <script src="../../temas/index/js/personalizado.js"></script>
    
    <script src="../../temas/index/js/aux_functions.js"></script>

</body>

</html>
