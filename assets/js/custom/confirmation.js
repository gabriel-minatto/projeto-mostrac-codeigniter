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
              swal({
                  title: "Concluído!",
                  text: "Deletado com sucesso.",
                  type:"success"},
                  function()
                  {
                     location=link; 
                  });
            });
        });
    
    
