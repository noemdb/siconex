// script para realizar el borrado del registro
$('.btn-delete').click(function (e) {
    e.preventDefault();

    // r = confirm("Estas seguro de realizar esta acción?");
    swal({
        title: 'Estas seguro de realizar esta acción?',
        text: "No podrás revertir esta acción",
        type: 'warning',
        showCancelButton: true,
        cancelButtonText: 'No, cancelar!',
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Si, borrar!'
    }).then((result) => {

    if (result.value) {

        var row = $(this).parents('tr'); //fila contentiva de la data
        var id = row.data('user');  //console.log(id);
        var form = $('#form-delete'); //console.log(form.attr('action'));
        var url = form.attr('action').replace(':USER_ID',id); //console.log(url);
        var data = form.serialize(); //console.log(data);

        $.post(url, data, function (result){
            
            row.fadeOut();

            var user_counter = $("#user_counter").text() - 1;
            
            $("#user_counter").text(user_counter);

            swal({
                title: result.messenge,
                type: 'success'
            });
            
        }).fail(function () {
            // alert('El usuario no fué eliminado');
            $("#admin_oper_nook").modal('toggle');
            $.each(result.responseJSON.errors,function(index,valor){
                //console.log('Index: '+index+' - Valor: '+valor);
                $("#msg_"+index+"_"+id_user).html(valor);
                $("#error_msg_"+index+"_"+id_user).fadeIn();
            });                    
        });

        }
    })


});//fin del evento clic