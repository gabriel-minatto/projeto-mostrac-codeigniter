<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Mostratec - ADM</title>
    
    <?php $this->load->view("includes/header_sources");//carregamos arquivos de estilo ?>
   
    <style>
        .vertical-center {
            min-height: 100%; /* Fallback for browsers do NOT support vh unit */
            min-height: 100vh; /* These two lines are counted as one :-)       */
			
            display: flex;
            align-items: center;
        }
		div{
		
			color:white;
			
		}
    </style>

</head>

<body>
    <!-- Header -->
    <header id="top" class="header">
        <div class="vertical-center">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 text-center">
                        <h1>Administração</h1>
                    </div>
                </div>                
                <div class="row">
                    <div class="col-lg-4 col-lg-offset-4">
                        <form class="form-horizontal" method="post" action="<?= base_url('admin/login')?>" id="login_form">
                            <fieldset>
                                <!-- Text input-->
                                <div class="form-group">
                                    <label for="email">Email:</label>
                                    <input id="email" name="email" type="email" placeholder="endereço de email" class="form-control input-md" required="">
                                </div>

                                <!-- Password input-->
                                <div class="form-group">
                                    <label for="senha">Senha:</label>
                                    <input id="senha" name="senha" type="password" placeholder="senha" class="form-control input-md" required="">
                                </div>

                                <!-- Button (Double) -->
                                <div class="form-group">
                                    <button id="submit" name="submit" type="submit" class="btn btn-default">Entrar</button>
                                    <button id="reset" name="reset" type="reset" class="btn btn-default">Limpar</button>
                                </div>

                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        
    </header>
</body>

</html>