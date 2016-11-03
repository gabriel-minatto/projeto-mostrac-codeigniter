    <div class="container-fluid bd-example-row">
        <div class="col-lg-8 col-lg-offset-2">
            <form class="form-horizontal" id="<?= $form_id ?>" method="post">
                <div class="row">
                    <!-- Text input-->
                    <div class="form-group">
                      <label for="name">Título:</label>
                      <input id="title" name="title" type="text" placeholder="titulo do relatorio" class="form-control input-md" required="">
                    </div>
                </div>
                <div class="row">
                    <!-- Text input-->
                    <div class="form-group">
                      <label for="content">Conteúdo:</label>
                      <textarea class="form-control" id="content" name="content" rows="6">Escreva aqui seu texto principal</textarea>
                    </div>
                </div>
            </form>
        </div>
    </div>