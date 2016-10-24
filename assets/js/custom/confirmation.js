$('.confirmation').click(
        function(e)
        {
            link = $(this).parent().attr("href");
            e.preventDefault();
        });
    
    $('.confirmation').confirmation({
        title: 'Você tem certeza?',
        btnOkLabel: '<i class="icon-ok-sign icon-white"></i> Sim',
        btnCancelLabel: '<i class="icon-ok-sign icon-white"></i> Não',
        onConfirm: function(a){
            location=link;
        }
    });