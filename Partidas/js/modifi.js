$(document).ready(function(){
    $('#tablaMaster').DataTable({
        "language": {
            //"url": "//cdn.datatables.net/plug-ins/1.10.15/i18n/Spanish.json"
            "decimal": "",
            "emptyTable": "No hay información",
            "info": "Mostrando _START_ a _END_ de _TOTAL_ Partidas Registradas",
            "infoEmpty": "Mostrando 0 to 0 of 0 Partidas Registradas",
            "infoFiltered": "(Filtrado de _MAX_ Partidas Registradas)",
            "infoPostFix": "",
            "thousands": ",",
            "lengthMenu": "Mostrar _MENU_ Partidas Registradas",
            "loadingRecords": "Cargando...",
            "processing": "Procesando...",
            "search": "Buscar:",
            "zeroRecords": "Sin resultados encontrados",
            "paginate": {
                "first": "Primero",
                "last": "Ultimo",
                "next": "Siguiente",
                "previous": "Anterior"
            }
          }
    });
});
function modificar(valor){
    //alert("me has mandado a llamar");
    document.getElementById('Formulario').style.display='block';
    $.ajax({
        data : {"Id" : valor},
        url: 'PHP/seleccionar.php',
        type: 'POST' , 
        beforeSend : function(){
            //$("#equivocado").html("Procesando...Espere Porfavor");
            //alert("procesamd");
        },
        success: function(response){
            console.log(response);
            //alert("Exito???");
            $("#frmmodi").html(response);
            //alert(response);
            //alert($("#equivocado").val());  
        }
    });
}
function inserta(){
    $.ajax({
        data : {"numpart" : $("#numpart").val(),"Desc" : $("#Desc").val()},
        url: 'PHP/Insertar.php',
        type: 'POST' , 
        beforeSend : function(){
            console.log("Usted esta realizando una transaccion en linea == tiene alkguna idea de lo que esta haciendo ?");
        },
        success: function(response){
            console.log(response); 
            if(response == "Partida Registrada Con Exito"){
                alert("Registro Con Exito!!");
                $(location).attr('href',"Index.php");
            }
            alert(response);
        }
    });
}
function actualiza(){
    ////NumPart Monto Desc NumFact NomEmp
    //alert($("#NumPart").val());
    $.ajax({
        data : {"NumPart" : $("#NumPart").val(),"Desc" : $("#Desc").val()},
        url: 'PHP/Actualizar.php',
        type: 'POST' , 
        beforeSend : function(){
            console.log("Usted esta realizando una transaccion en linea == tiene alkguna idea de lo que esta haciendo ?");
        },
        success: function(response){
            console.log(response);
            //alert("Exito???");
            $("#resultados").html(response);
            alert('Datos Modificados Con Exito!!!');
            location.reload();
            //alert(response);
            //alert($("#equivocado").val());  
        }
    });

}
function cierraFormulario(){
    onclick="document.getElementById('Formulario').style.display='none'";
}
function aceptar(val){
    alert("as");
    $("#Cvepart").val(val);
    $('#myfrmBusqueda').modal('hide');
}