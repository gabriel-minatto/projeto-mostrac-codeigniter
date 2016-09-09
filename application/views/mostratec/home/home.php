<?php $this->load->view("includes/header");//carregamos o header e o menu da pagina ?>

    <div class="container">
        <div class='row'>
                <div class='box text-center'>
                        
                        <h1>Bem-vindo</h1>
                        
                </div>
        </div>

        <div class="row">
            <div class="box">
                <div class="col-lg-12 text-center">
                    <div id="carousel-example-generic" class="carousel slide">
                        <!-- Indicators -->
                        <ol class="carousel-indicators hidden-xs">
                            <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                            <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                            <li data-target="#carousel-example-generic" data-slide-to="2"></li>
                        </ol>

                        <!-- Wrapper for slides -->
                        <div class="carousel-inner">
                            <div class="item active">
                                <img class="img-responsive img-full" src="<?= base_url('uploads/home/img/slide-1.jpg')?>" alt="">
                            </div>
                            <div class="item">
                                <img class="img-responsive img-full" src="<?= base_url('uploads/home/img/slide-2.jpg')?>" alt="">
                            </div>
                            <div class="item">
                                <img class="img-responsive img-full" src="<?= base_url('uploads/home/img/slide-3.jpg')?>" alt="">
                            </div>
                        </div>

                        <!-- Controls -->
                        <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
                            <span class="icon-prev"></span>
                        </a>
                        <a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
                            <span class="icon-next"></span>
                        </a>
                    </div>
                    <h2 class="brand-before">
                        <small>"A ciência não é uma ilusão, mas seria uma ilusão acreditar que poderemos encontrar noutro lugar o que ela não nos pode dar."</small>
                    </h2>
                    <hr class="tagline-divider">
                    <h2>
                        <small>Por
                            <strong>Sigmund Freud</strong>
                        </small>
                    </h2>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="box">
                <div class="col-lg-12">
                    <hr>
                    <h2 class="intro-text text-center">Iniciação Científica
                        <strong>Mostratec</strong>
                    </h2>
                    <hr>
                    <img class="img-responsive img-border img-left"src="<?= base_url('uploads/home/img/intro-pic.jpg')?>" alt="">
                    <hr class="visible-xs">
                    <p>Vivamus quis pretium sapien, non semper justo. Praesent ac fermentum tellus. Morbi in diam rhoncus, rhoncus metus ut, finibus neque. Phasellus eu rutrum quam. Morbi ex dui, condimentum nec euismod id, elementum at tellus. </p>
                    <p>Curabitur vel ante nisl. In ultricies congue neque at convallis. Quisque molestie est vel dolor ultrices, efficitur pharetra arcu porta. Donec metus ante, tempus eget erat ut, euismod porta libero.</p>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc placerat diam quis nisl vestibulum dignissim. In hac habitasse platea dictumst. Interdum et malesuada fames ac ante ipsum primis in faucibus. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas.</p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="box">
                <div class="col-lg-12">
                    <hr>
                    <h2 class="intro-text text-center">Já Possui Um Cadastro?
                        <strong>Faça login abaixo!</strong>
                    </h2>
                    <hr>
                    <form class="form-horizontal" method="post" action="php/login.php" id="login_form">
                        
                        <fieldset>
                        
                        <!-- Text input-->
                        <div class="form-group">
                          <label class="col-md-4 control-label" for="email">Email:</label>  
                          <div class="col-md-4">
                          <input id="email" name="email" type="email" placeholder="endereço de email" class="form-control input-md" required="">
                            
                          </div>
                        </div>
                        
                        <!-- Password input-->
                        <div class="form-group">
                          <label class="col-md-4 control-label" for="senha">Senha:</label>
                          <div class="col-md-4">
                            <input id="senha" name="senha" type="password" placeholder="senha" class="form-control input-md" required="">
                            
                          </div>
                        </div>
                        
                        <!-- Button (Double) -->
                        <div class="form-group">
                          <label class="col-md-4 control-label" for="submit"></label>
                          <div class="col-md-8">
                            <button id="submit" name="submit" type="submit" class="btn btn-default">Entrar</button>
                            <button id="reset" name="reset" type="reset" class="btn btn-default">Limpar</button>
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
    
    <?php $this->load->view("includes/footer_sources");//carregamos os scripts e plugins da pagina ?>
    
    <!-- Script to Activate the Carousel -->
    <script>
    $('.carousel').carousel({
        interval: 5000 //changes the speed
    })
    </script>

</body>

</html>
