
var tabla;

//Función que se ejecuta al inicio
function init(){
	listar();
}
function limpiar()
{

	$("#txt_razonsocial").val("");
	$("#txt_nombrecomercial").val("");
	$("#txt_ruc").val("");
	$("#txt_ciudad").val("");
	$("#txt_telefono").val("");
	$("#txt_categoria").val("");
}

function listar(){
   tabla=$('#empresas').dataTable(
        {
            "aProcessing": true,//Activamos el procesamiento del datatables
            "aServerSide": true,//Paginación y filtrado realizados por el servidor
            dom: 'Bfrtip',//Definimos los elementos del control de tabla
            "ajax":
                    {
                        url: 'empresas',
                        type : "get",
                        dataType : "json",						
                        error: function(e){
                            console.log(e.responseText);	
                        }
                    },
            "bDestroy": true,
            "iDisplayLength": 5,//Paginación
            "order": [[ 0, "desc" ]]//Ordenar (columna,orden)
        }).DataTable();
}
function guardar(e)
{
    //e.preventDefault(); //No se activará la acción predeterminada del evento
    
    var form = document.getElementById('addform');
    var formData = new FormData(form);

    //console.log(form);
    $.ajaxSetup({
        headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
    });

	$.ajax({
        type: "POST",
        url: "empresas",
        data: formData,
        dataType: "json",
	    contentType: false,
	    processData: false,

	    success: function(datos)
	    {                    

             console.log(datos);
             alert("Actualizado");
             $('#editarempresa').modal('hide');
             location.reload();

	    }

	});
    limpiar();
}

$(document).ready(function(){
    $('.editbtn').on('click',function(){
        $('#editarempresa').modal('show');


        $tr = $(this).closest('tr');

        var data = $tr.children("td").map(function(){
            return $(this).text();

        }).get();

        console.log(data[0]);

        $('#id').val(data[0]);
        $('#txt_razonsocial').val(data[1]);
        $('#txt_nombrecomercial').val(data[2]);
        $('#txt_ruc').val(data[3]);
        $('#txt_ciudad').val(data[4]);
        $('#txt_telefono').val(data[5]);
        $('#slt_categoria').val(data[6]);

    });
    $('#editFormID').on('submit',function(e){
        e.preventDefault();

        var id = $('#id').val();

        $.ajax({
            type: "PUT",
            url: "empresas/"+id,
            data: $('#editFormID').serialize(),
            success: function(response){
                console.log(response);
                $('#editarempresa').modal('hide');
                alert("Actualizado");
                location.reload();
            },
            error: function(Error) {
                console.log(error);
            }
        });
    });

    $('.deletebtn').on('click',function(){
        let id = this.id;
       // console.log(id);

        $.ajax({
            type: "DELETE",
            url: "empresas/"+id,
            success: function(response){
                console.log(response);
                $('#editarempresa').modal('hide');
                alert("Eliminado");
                location.reload();
            },
            error: function(Error) {
                console.log(error);
            }
        });
    });

    $('.addbtn').on('click',function(){

        $.ajaxSetup({
            headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
        });
        
        //console.log('hola');

        $.ajax({
            type: "POST",
            url: "usuarios",
            data: $('#addform').serialize(),
            //dataType:"json",
            success: function(response){
                console.log(response);
                $('#addusuario').modal('hide');
                alert("guardado");
                location.reload();
            },
            error: function(Error) {
                console.log(error);
            }
        });
    });

    $('.editusuariobtn').on('click',function(){
        console.log('editar')
        $('#editarusuario').modal('show');


        $tr = $(this).closest('tr');

        var data = $tr.children("td").map(function(){
            return $(this).text();

        }).get();

        console.log(data[0]);

        $('#id').val(data[0]);
        $('#txt_ape_paterno').val(data[2]);
        $('#txt_ape_materno').val(data[3]);
        $('#txt_dni').val(data[4]);
        $('#txt_direccion').val(data[5]);
        $('#txt_telefono').val(data[6]);
        $('#txt_foto').val(data[7]);
        $('#txt_cargo').val(data[8]);
        $('#txt_salario').val(data[9]);
        $('#txt_password').val(data[10]);
        $('#txt_email').val(data[11]);
        $('#slt_categoria').val(data[12]);


    });
})

