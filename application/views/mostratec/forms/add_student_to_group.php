<?php extract($data);
?>
    <?php if($refresh != 1){ ?>
    <div id="student_to_group_filter">
      <div class="col-lg-8 col-lg-offset-2">
        <form class="form-horizontal" method="post" id="add_student_group_filter">
            <!-- Text input-->
            <div class="form-group">
              <label for="name_filter">Nome:</label>
              <input id="name_filter" name="u.nome" type="text" placeholder="nome do aluno" class="form-control input-md">
            </div>
            <!-- Text input-->
            <div class="form-group">
              <label for="email_filter">Email:</label>
              <input id="email_filter" name="u.email" type="text" placeholder="email do aluno" class="form-control input-md">
            </div>
             <!-- Text input-->
            <div class="form-group">
              <a id="set_student_group_add_filter" class="btn btn-default">Filtrar</a>
            </div>
          </form>
    </div>
    </div>
    <?php } ?>
    <div id="student_field">
      <div class="col-lg-8 col-lg-offset-2">
        <form class="form-horizontal" method="post" id="add_student_to_group_form">
          <!-- Text input-->
          <div class="form-group">
            <select id="aluno" name="aluno" class="form-control">
              <?php foreach($alunos as $aluno){ 
                if($aluno->is_on_group == null){ ?>
                  <option value="<?= $aluno->id ?>"><?= $aluno->nome ?> | <?= $aluno->email ?></option>
              <?php }} ?>
            </select>
          </div>
      </form>
    </div>
          </div>

  <script>
    $("#set_student_group_add_filter").on("click",
      function()
      {
        $("#add_student_to_group_modal .modal-body").block({message:"Processando, aguarde..."});
        $(".modal-footer button").block({message:""});
        form_value = JSON.stringify($("#add_student_group_filter").serializeArray());
        dataform = {grupo:"<?= $grupo->id ?>",form:form_value,refresh:1};
        $.post("<?= base_url('admin/grupos/alunos/carregar-add-form') ?>",dataform)
          .done(
            function(form){
              $("#add_student_to_group_modal .modal-body, button").unblock();
              if(form != "0")
                $("#student_field").html(form);
              else
              {
                swal({   
                        title: "Ops,",
                        text: "Parece que sua busca não retornou resultados! Tente novamente.",
                        type: "error" });
              }
            });
        });
    
      
    $("#add_student_to_group_submit").click(
    function()
    {
        $("#add_student_to_group_modal .modal-body").block({message:"Processando, aguarde..."});
        $(".modal-footer button").block({message:""});
        student = $("#aluno").val();
        $.ajax({
        type: 'post',
        url: "<?= base_url('admin/grupos/alunos/adicionar') ?>",
        data: {grupo:"<?= $grupo->id ?>",aluno:student},
        dataType: 'html'
        })
        .done(
            function(data){
                $("#add_student_to_group_modal .modal-body, button").unblock();
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
                    $("#add_student_to_group_form").trigger("reset");
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
  
    $("#add_student_to_group_form").keypress(function(tecla)
    {
        if(tecla.which == 13)
        {
            $("#add_student_to_group_submit").trigger("click");
        }
    });
    
  </script>
