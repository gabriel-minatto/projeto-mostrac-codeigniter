<?php extract($data);

$upload_path = "./uploads/groups/posts/";
$post_dir = $upload_path.string_to_slug($post->title)."_".$post->id;
$carrossel_dir = $post_dir."/carrossel/";

?>
    <div class="container-fluid bd-example-row">
        <div class="col-lg-10 col-lg-offset-1">
            <form class="form-horizontal" id="<?= $form_id ?>" method="post">
                <!-- Text input-->
                <div class="form-group">
                  <label for="textinput">Título:</label>  
                      <input id="title" name="title" type="text" placeholder="nome da postagem" class="form-control input-md" value="<?= $post->title ?>" required="">
                </div>
                
                <!-- Text input-->
                <div class="form-group">
                  <label for="description">Descrição:</label>  
                      <input id="description" name="description" type="text" placeholder="sobre o que está postagem falará?" class="form-control input-md" value="<?= $post->description ?>" required="">
                </div>
                
                <!-- Textarea -->
                <div class="form-group">
                  <label for="content">Conteúdo:</label>
                    <textarea class="form-control" id="content" name="content" rows="6"><?= $post->content ?></textarea>
                </div>
                
                <!-- Text input-->
                <div class="form-group">
                  <label for="video">Vídeo(opcional):</label>
                    <div class="input-group">
                        <span class="input-group-addon">https://www.youtube.com/watch?v=</span>
                        <input id="video" name="video" type="text" placeholder="Link do vídeo" class="form-control input-md" value="<?= $post->video ?>">
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
                
                 <!-- Textarea -->
                <div class="form-group">
                  <label>Clique para deletar imagens do carrossel:</label><br>
                    <?php foreach($carrossel_images as $image){  //$carrossel_dir?>
                    <a href="<?= base_url('grupos/posts/editar/deletar-img/'.$post->id.'/'.$image->nome) ?>">
                      <img class="confirmation" src="<?= base_url($carrossel_dir.$image->nome) ?>" style="width: 100px;" />
                    </a>
                    <?php } ?>
                </div>
            </form>
        </div>
    </div>
    <script>
      $('.confirmation').click(
        function(e)
        {
            link = $(this).parent().attr("href");
            e.preventDefault();
            swal({
              title: "Você tem certeza?",
              type: "warning",
              showCancelButton: true,
              cancelButtonText: "Cancelar",
              confirmButtonColor: "#DD6B55",
              confirmButtonText: "Continuar",
              closeOnConfirm: false
            },
            function()
            {
                location=link;
            });
        });
    </script>