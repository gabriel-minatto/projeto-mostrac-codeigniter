<div id="<?= $modal_id ?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="<?= $modal_id.'_label'?>" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="<?= $modal_id.'_label'?>"><?= $title ?></h4>
      </div>
      <div class="modal-body">
        <?php $this->load->view($formulario,array("form_id"=>$form_id,"data"=>$data)); ?>
      </div>
      <div class="modal-footer">
        <div class="form-group">
            <button class="btn btn-secondary close_modal"  data-dismiss="modal">Fechar</button>
            <button id="submit_<?= $form_id ?>" type="submit" name="submit" class="btn btn-primary">Criar</button>
        </div>
      </div>
    </div>
  </div>
</div>
<script>
  /*  $("#submit_<?= $form_id ?>").click(
        function()
        {
            var dataform = new FormData($("#<?= $form_id ?>"));
            $.ajax({
            type: 'post',
            url: '<?= $action ?>',
            data: dataform,
            mimeType:"multipart/form-data"
            })
            .done(
                function(data){
                    if(data == "0")
                    {
                        location="<?= base_url()?>grupos/posts/view/"+data;
                    }
                    else
                    {
                        swal({   
                            title: "Ops,",
                            text: "Algo deu errado, tente novamente mais tarde!",
                            type: "error" });
                    }
                });
        });*/
        
        $("#submit_<?= $form_id ?>").click(
        function()
        {
            var formData = new FormData($("#<?= $form_id ?>")[0]);
            var url = "<?= $action ?>";
            $.ajax({
                url: url,
                type: 'POST',
                data:  formData,
                mimeType:"multipart/form-data",
                contentType: false,
                cache: false,
                processData:false,
                success: function(data, textStatus, jqXHR)
                    {
                        console.log(data);
                    },
                error: function(jqXHR, textStatus, errorThrown) 
                    {
                        aler("erro");
                    }          
                });
        });
    
</script>