<?php extract($data);?>
    <div class="container-fluid bd-example-row">
        <div class="col-lg-10 col-lg-offset-1">
            <form class="form-horizontal" id="<?= $form_id ?>" method="post">
                <!-- Text input-->
                <div class="form-group">
                  <label for="textinput">Título:</label>  
                      <input id="title" name="title" type="text" placeholder="nome da postagem" class="form-control input-md" required="">
                </div>
                
                <!-- Text input-->
                <div class="form-group">
                  <label for="description">Descrição:</label>  
                      <input id="description" name="description" type="text" placeholder="sobre o que está postagem falará?" class="form-control input-md" required="">
                </div>
                
                <!-- Textarea -->
                <div class="form-group">
                  <label for="content">Conteúdo:</label>
                    <textarea class="form-control" id="content" name="content" rows="6">Escreva aqui seu texto principal</textarea>
                </div>
                
                <!-- Text input-->
                <div class="form-group">
                  <label for="video">Vídeo(opcional):</label>
                      
                    <div class="input-group">
                        <span class="input-group-addon">https://www.youtube.com/watch?v=</span>
                        <input id="video" name="video" type="text" placeholder="Link do vídeo" class="form-control input-md">
                    </div>
                </div>
                
                <!-- Text input-->
                <div class="form-group">
                    <label class="btn btn-info btn-file" for="capa">
                         Enviar Capa&nbsp;&nbsp;&nbsp;<i class="fa fa-upload"></i>
                        <input id="capa" name="capa" type="file" placeholder="" class="form-control input-md" required="" style="/*display: none;*/">
                    </label>
                </div>
                
                <!-- Text input-->
                <div class="form-group">
                  <label class="btn btn-success btn-file" for="carrossel">
                      Enviar Imagens (opcional)&nbsp;&nbsp;&nbsp;<i class="fa fa-upload"></i>
                      <input id="carrossel" name="carrossel[]" type="file" placeholder="" class="form-control input-md" multiple style="/*display: none;*/">
                  </label>  
                      
                </div>
            </form>
        </div>
    </div>