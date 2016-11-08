<?php extract($data); ?>
    <?php if($refresh != 1){ ?>
    <div id="moderator_to_group_filter">
      <div class="col-lg-8 col-lg-offset-2">
        <form class="form-horizontal" method="post" id="add_moderator_group_filter">
            <!-- Text input-->
            <div class="form-group">
              <label for="moderator_name">Nome:</label>
              <input id="moderator_name" name="moderator_name" type="text" placeholder="nome do moderador" class="form-control input-md">
            </div>
            <!-- Text input-->
            <div class="form-group">
              <label for="moderator_email">Email:</label>
              <input id="moderator_email" name="moderator_email" type="text" placeholder="email do moderador" class="form-control input-md">
            </div>
             <!-- Text input-->
            <div class="form-group">
              <a id="set_moderator_group_add_filter" class="btn btn-default">Filtrar</a>
            </div>
          </form>
    </div>
    </div>
    <?php } ?>
    <div id="moderator_field">
      <div class="col-lg-8 col-lg-offset-2">
        <form class="form-horizontal" method="post" id="add_moderator_to_group_form">
          <!-- Text input-->
          <div class="form-group">
            <select id="moderator" name="moderator" class="form-control">
              <?php foreach($moderators as $moderator){ 
                if($moderator->is_on_group == null){ ?>
                  <option value="<?= $moderator->id ?>"><?= $moderator->nome ?> | <?= $moderator->email ?></option>
              <?php }} ?>
            </select>
          </div>
        </form>
      </div>
    </div>

  <?php if($refresh != 1){ ?>
    <script>
      $("#set_moderator_group_add_filter").on("click",
        function()
        {
          $("#add_moderator_to_group_modal .modal-body").block({message:"Processando, aguarde..."});
          $(".modal-footer button").block({message:""});
          form_value = JSON.stringify($("#add_moderator_group_filter").serializeArray());
          dataform = {grupo:"<?= $grupo->id ?>",moderator_form:form_value,refresh:1};
          $.post("<?= base_url('admin/grupos/moderadores/carregar-add-form') ?>",dataform)
            .done(
              function(form){
                $("#add_moderator_to_group_modal .modal-body, button").unblock();
                if(form != "0")
                  $("#moderator_field").html(form);
                else
                {
                  swal({   
                          title: "Ops,",
                          text: "Parece que sua busca não retornou resultados! Tente novamente.",
                          type: "error" });
                }
              });
          });
      
        
      $("#add_moderator_to_group_submit").click(
      function()
      {
          $("#add_student_to_group_modal .modal-body").block({message:"Processando, aguarde..."});
          $(".modal-footer button").block({message:""});
          moderator = $("#moderator").val();
          $.ajax({
          type: 'post',
          url: "<?= base_url('admin/grupos/moderadores/adicionar') ?>",
          data: {grupo:"<?= $grupo->id ?>",moderador:moderator},
          dataType: 'html'
          })
          .done(
              function(data){
                  $("#add_moderator_to_group_modal .modal-body, button").unblock();
                  if(data == "1")
                  {
                      swal({
                          title: "Concluído,",
                          text: "<?= $success ?>",
                          type: "success" },
                            function()
                            {
                              location.reload(); 
                            });
                      $("#add_moderator_to_group_form").trigger("reset");
                      $(".close_modal").trigger("click");
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
    
      $("#add_moderator_to_group_form").keypress(function(tecla)
      {
          if(tecla.which == 13)
          {
              $("#add_moderator_to_group_submit").trigger("click");
          }
      });
      
    </script>
<?php } ?>