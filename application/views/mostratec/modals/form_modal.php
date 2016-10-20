<div id="<?= $modal_id ?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="<?= $modal_id.'_label'?>" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="<?= $modal_id.'_label'?>"><?= $title ?></h4>
      </div>
      <div class="modal-body">
        <?php $this->load->view($formulario,array("form_id"=>$form_id)); ?>
      </div>
      <div class="modal-footer">
        <div class="form-group">
            <button class="btn btn-secondary" id="close_modal" data-dismiss="modal">Fechar</button>
            <button id="submit" type="submit" name="submit" class="btn btn-primary">Salvar</button>
        </div>
      </div>
    </div>
  </div>
</div>
<script>
    $("#submit").click(
        function()
        {
            var dataform = $("#<?= $form_id ?>").serialize();
            $.ajax({
            type: 'post',
            url: '<?= $action ?>',
            data: dataform,
            dataType: 'html'
            })
            .done(
                function(data){
                    if(data == "1")
                    {
                        swal({   
                            title: "Concluído,",
                            text: "Escola adicionada com sucesso.",
                            type: "success" });
                        $("#close_modal").trigger("click");
                    }
                    else
                    {
                        swal({   
                            title: "Ops,",
                            text: "Parece que algo deu errado! Tente novamente mais tarde.",
                            type: "error" });
                    }
                });
        });
    
</script>