<?php $this->load->view("includes/header");//carregamos o header e o menu da pagina ?>

    <div class="container">

        <div class="row">
            <div class="box">
                <div class="col-sm-offset-3 col-sm-6">
                    <hr>
                    <h2 class="intro-text text-center">Formulário de
                        <strong>cadastro</strong>
                    </h2>
                    <hr>
                   <form class="form-horizontal" method="POST" action="<?= base_url('usuario/salvar')?>">
                        <div id="form_tabs">
                            <ul>
                                <li><a href="#form_aluno">Dados do Aluno</a></li>
                                <li><a href="#form_school">Dados da Escola</a></li>
                            </ul>
                               <div class="col-lg-12" id="form_aluno">
                                <fieldset>
                                    <!-- Text input-->
                                    <div class="form-group">
                                      <label class="col-md-2 control-label" for="nome">Nome:</label>  
                                      <div class="col-md-8">
                                      <input id="nome" name="nome" type="text" placeholder="nome completo" class="form-control input-md" required="">
                                        
                                      </div>
                                    </div>
                                    
                                    <!-- Text input-->
                                    <div class="form-group">
                                      <label class="col-md-2 control-label" for="email">Email:</label>  
                                      <div class="col-md-8">
                                      <input id="email" name="email" type="text" placeholder="sample@sample.com" class="form-control input-md" required="">
                                        
                                      </div>
                                    </div>
                                    
                                    <!-- Text input-->
                                    <div class="form-group">
                                      <label class="col-md-2 control-label" for="login">Login:</label>  
                                      <div class="col-md-8">
                                      <input id="login" name="login" type="text" placeholder="login" class="form-control input-md" required="">
                                        
                                      </div>
                                    </div>
                                    
                                    <!-- Text input-->
                                    <div class="form-group">
                                      <label class="col-md-2 control-label" for="senha">Senha:</label>  
                                      <div class="col-md-8">
                                      <input id="senha" name="senha" type="text" placeholder="senha" class="form-control input-md" required="">
                                        
                                      </div>
                                    </div>
                                </fieldset>
                                </div>
                                <div class="col-lg-12" id="form_school">
                                    <fieldset>
                                        <div id="filtro">
                                            <!-- Select Basic -->
                                            <div class="form-group">
                                              <label class="col-md-2 control-label" for="selectbasic">País:</label>
                                              <div class="col-md-8">
                                                <select id="selectbasic" name="selectbasic" class="form-control">
                                                  <option value="1">1</option>
                                                </select>
                                              </div>
                                              <button type="button" class="btn btn-default btn-md" id="apply_filter">
                                            <span class="glyphicon glyphicon-refresh" aria-hidden="true"></span>
                                          </button>
                                            </div>
                                            <!-- Select Basic -->
                                            <div class="form-group">
                                              <label class="col-md-2 control-label" for="uf">UF:</label>
                                              <div class="col-md-8">
                                                <select id="uf" name="uf" class="form-control">
                                                  <option value="1">1</option>
                                                </select>
                                              </div>
                                            </div>
                                            
                                            <!-- Select Basic -->
                                            <div class="form-group">
                                              <label class="col-md-2 control-label" for="cidade">Cidade:</label>
                                              <div class="col-md-8">
                                                <select id="cidade" name="cidade" class="form-control">
                                                  <option value="1">1</option>
                                                </select>
                                              </div>
                                            </div>
                                        </div>
                                        <!-- Select Basic -->
                                        <div class="form-group">
                                          <label class="col-md-2 control-label" for="school">Escola:</label>
                                          <div class="col-md-8">
                                            <select id="school" name="school" class="form-control">
                                              <option value="1">1</option>
                                            </select>
                                          </div>
                                          <button type="button" class="btn btn-default btn-md" id="filter_toggle">
                                            Filtrar <span class="glyphicon glyphicon-search" aria-hidden="true"></span>
                                          </button>
                                        </div>
                                    </fieldset>
                                </div>
                            </div>
                        <!-- Button (Double) -->
                        <div class="form-group">
                          <label class="col-md-4 control-label" for="submit"></label>
                          <div class="col-md-8">
                            <button id="submit" name="submit" class="btn btn-default">Salvar</button>
                            <button id="reset" name="reset" class="btn btn-info">Limpar</button>
                          </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>

    </div>
    <!-- /.container -->
<?php $this->load->view("includes/footer");//carregamos o header e o menu da pagina ?>
<script>
    $(document).ready(
        function()
        {
            $("#form_tabs").tabs();
            $("#filtro").toggle("slow");
            $("#filter_toggle").click(
                function()
                {
                    $("#filtro").toggle("slow");
                });
            $("#apply_filter").click(
                
                //ajax para filtrar school    
            );
        });
    
</script>
