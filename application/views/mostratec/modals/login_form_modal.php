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
            <button id="submit_<?= $form_id ?>" type="submit" name="submit" class="btn btn-primary">Entrar</button>
        </div>
      </div>
    </div>
  </div>
</div>
<script>
    $("#submit_<?= $form_id ?>").click(
        function()
        {
            $(".container-fluid,.bd-example-row").block({message:"Processando, aguarde..."});
            $(".modal-footer button").block({message:""});
            var dataform = $("#<?= $form_id ?>").serialize();
            $.ajax({
            type: 'post',
            url: '<?= $action ?>',
            data: dataform,
            dataType: 'html'
            })
            .done(
                function(data){
                    $(".container-fluid,.bd-example-row, button").unblock();
                    if(data == "1")
                    {
                        location.reload();
                    }
                    else
                    {
                        swal({   
                            title: "Ops,",
                            text: "Login e senha não correspondem!",
                            type: "error" });
                    }
                });
        });
        
        $("#<?= $form_id ?>").keypress(function(tecla)
        {
            if(tecla.which == 13)
            {
                $("#submit_<?= $form_id ?>").trigger("click");
            }
        });
    
</script>