// script para realizar el borrado del registro
$('.btn-delete').click(function (e) {
    e.preventDefault();
    // r = confirm("Estas seguro de realizar esta acción?");
    if (confirm("Estas seguro de realizar esta acción? Se eliminará definitivamente")) {
        var row = $(this).parents('tr'); //fila contentiva de la data
        var id = row.data('institucion');  //console.log(id);
        var form = $('#form-delete'); //console.log(form.attr('action'));
        var url = form.attr('action').replace(':INSTITUCION_ID',id); //console.log(url);
        var data = form.serialize(); //console.log(data);

        $.post(url, data, function (result){
            
            row.fadeOut();

            var institucion_counter = $("#institucion_counter").text() - 1;
            
            $("#institucion_counter").text(institucion_counter);

            $(text_institucion_delete).removeClass("text-danger").addClass("text-success show").text(result.messenge);
            
        }).fail(function () {
            alert('El registro no fué eliminado');
            // $("#admin_oper_nook").modal('toggle');
            $.each(result.responseJSON.errors,function(index,valor){
                console.log('Index: '+index+' - Valor: '+valor);
                // $("#msg_"+index+"_"+id_institucion).html(valor);
                // $("#error_msg_"+index+"_"+id_institucion).fadeIn();
            });                    
        });
    }
});//fin del evento clic