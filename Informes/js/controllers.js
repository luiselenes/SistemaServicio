$(document).ready(function(){
    recargaTabla();  
});
function cierraFormulario(){
    onclick="document.getElementById('Formulario').style.display='none'";
}
function selecInforme(cve,tipo){
    alert("Hola 7u7");
}
var cveglobal; 
var tipgloval;
function preguntar(id,tipo){
    cveglobal = id ;
    tipgloval = tipo ; 
    $('#myModal').modal('show');
}
function Eliminar(){
    console.log(cveglobal);
    console.log(tipgloval);
    DeleteInforme(cveglobal,tipgloval);
}
function DeleteInforme(cve,tipo)
{
    //alert(cve + " " + tipo );
    $.ajax({
        data:{"opc":1,"cve":cve,"tipo":tipo},
        url : 'PHP/Model.php',
        type:'POST',
        success:function(response){
            console.log(response);
            $("#myModal2").modal('show');
            recargaTabla();
        }
    });
}

//
function ActualizarProyecto(){
        //alert('Entrando a ActualizarProyecto');
        var cve = $("#CveP").val();
        var titproy = $("#TituloP").val();
        var fi = $("#FI").val();
        var ff = $("#FF").val();
        var dirnom = $("#DirProy").val();
        var colab = $("#Colaboradores").val();
        var monto = $("#Monto").val();
        //alert(clave + " " + monto );
        $.ajax({
        data : {"opc":2,"titulo":titproy,"cvep":cve,"usr1":fi,"usr2":ff,"dirname":dirnom,"colaboradores":colab,"monto":monto},
        url: 'PHP/Modelo.php',
        type: 'POST' , 
        beforeSend : function(){
            console.log("Usted esta realizando una transaccion en linea == tiene alguna idea de lo que esta haciendo ?");
        },
        success: function(response){
            console.log(response);
            $("#resultados").html(response);
            document.getElementById('Formulario').style.display='none'
            $("#dialogo").modal('show'); 
            recargaTabla();
            }
       });

}
function recargaTabla(){
    $.ajax({
        data:{"opc":0},
        url : 'PHP/Model.php',
        type:'POST',
        success:function(response){
            $("#tablaFrame").html(response);
            $('#tablaMaster').DataTable({
            "language": {
                //"url": "//cdn.datatables.net/plug-ins/1.10.15/i18n/Spanish.json"
                "decimal": "",
                "emptyTable": "No hay información",
                "info": "Mostrando _START_ a _END_ de _TOTAL_ Informes Registrados",
                "infoEmpty": "Mostrando 0 to 0 of 0 de Informes Registrados",
                "infoFiltered": "(Filtrado de _MAX_ Proyectos Registrados)",
                "infoPostFix": "",
                "thousands": ",",
                "lengthMenu": "Mostrar _MENU_ Informes Registrados",
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
        }
    });
}

