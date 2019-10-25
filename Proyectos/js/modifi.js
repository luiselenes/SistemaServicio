$(document).ready(function(){
    recargaTabla();
    $('#tablaMaster').DataTable({
        "language": {
            //"url": "//cdn.datatables.net/plug-ins/1.10.15/i18n/Spanish.json"
            "decimal": "",
            "emptyTable": "No hay información",
            "info": "Mostrando _START_ a _END_ de _TOTAL_ Proyectos Registrados",
            "infoEmpty": "Mostrando 0 to 0 of 0 de Proyectos Registradoss",
            "infoFiltered": "(Filtrado de _MAX_ Proyectos Registrados)",
            "infoPostFix": "",
            "thousands": ",",
            "lengthMenu": "Mostrar _MENU_ Proyectos Registrados",
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
function cierraFormulario(){
    onclick="document.getElementById('Formulario').style.display='none'";
}
function agAtrib(){
    $('#tablaMaster').DataTable({
        "language": {
            //"url": "//cdn.datatables.net/plug-ins/1.10.15/i18n/Spanish.json"
            "decimal": "",
            "emptyTable": "No hay información",
            "info": "Mostrando _START_ a _END_ de _TOTAL_ Proyectos Registrados",
            "infoEmpty": "Mostrando 0 to 0 of 0 de Proyectos Registradoss",
            "infoFiltered": "(Filtrado de _MAX_ Proyectos Registrados)",
            "infoPostFix": "",
            "thousands": ",",
            "lengthMenu": "Mostrar _MENU_ Proyectos Registrados",
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
function insertarDatos(){
    //alert('Mandando a llamar al metodo');
    var titproy = $("#titulo").val();
    var cve = $("#cvep").val();
    var fi = $("#usr1").val(); 
    var ff = $("#usr2").val();
    var dirnom = $("#dirname").val();
    var colab =$("#colaboradores").val();
    var monto = $("#monto").val();
    if(titproy === "" || cve === "" || fi === "" || ff === "" || dirnom === "" || colab === "" || monto === ""){
        alert('Faltan Ciertos Datos Por Completar');
        return ;
    }
    //alert(titproy + "-" +cve + "-" +fi + "-" +ff + "-" +dirnom + "-" +colab + "-" +monto);
    $.ajax({
        data : {"opc":1,"titulo":titproy,"cvep":cve,"usr1":fi,"usr2":ff,"dirname":dirnom,"colaboradores":colab,"monto":monto},
        url: 'PHP/Modelo.php',
        type: 'POST' , 
        beforeSend : function(){
            console.log("Usted esta realizando una transaccion en linea == tiene alguna idea de lo que esta haciendo ?");
        },
        success: function(response){
            $("#resultados").html(response);
            $("#dialogo").modal('show');
             $("#titulo").val("");
             $("#cvep").val("");
             $("#usr1").val(""); 
             $("#usr2").val("");
             $("#dirname").val("");
             $("#colaboradores").val("");
             $("#monto").val("");
            //alert("Exito???");
            /*document.getElementById('Formulario').style.display='block';
            $("#frmmodi").html(response);
            */
            //alert(response);
            //alert($("#equivocado").val());  
        }
    });

}

var cveGlobal;
//funcion para seleccionar todos los detalles del Proyecto
function selecInforme(cve){
    ////NumPart Monto Desc NumFact NomEmp
    cveGlobal = cve ;
    $.ajax({
        data : {"Cvep" : cve},
        url: 'PHP/DetalleProyecto.php',
        type: 'POST' , 
        beforeSend : function(){
            console.log("Usted esta realizando una transaccion en linea == tiene alguna idea de lo que esta haciendo ?");
        },
        success: function(response){
            //console.log(response);
            //alert("Exito???");
            document.getElementById('Formulario').style.display='block';
            $("#frmmodi").html(response);

            //alert(response);
            //alert($("#equivocado").val());  
        }
    });
}
//
function ActualizarProyecto(){
        //alert('Entrando a ActualizarProyecto');
        //alert(cveGlobal);
        var cve = $("#CveP").val();
        var titproy = $("#TituloP").val();
        var fi = $("#FI").val();
        var ff = $("#FF").val();
        var dirnom = $("#DirProy").val();
        var colab = $("#Colaboradores").val();
        var monto = $("#Monto").val();
        //alert(clave + " " + monto );
        $.ajax({
        data : {"opc":2,"titulo":titproy,"cvep":cveGlobal,"cvepn":cve,"usr1":fi,"usr2":ff,"dirname":dirnom,"colaboradores":colab,"monto":monto},
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
function eliminaProyecto(){
$.ajax({
        data : {"opc":5,"cvep":cveGlobal},
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
        data:{"opc":3},
        url : 'PHP/Modelo.php',
        type:'POST',
        success:function(response){
            $("#tablaFrame").html(response);
            $('#tablaMaster').DataTable({
            "language": {
                //"url": "//cdn.datatables.net/plug-ins/1.10.15/i18n/Spanish.json"
                "decimal": "",
                "emptyTable": "No hay información",
                "info": "Mostrando _START_ a _END_ de _TOTAL_ Proyectos Registrados",
                "infoEmpty": "Mostrando 0 to 0 of 0 de Proyectos Registradoss",
                "infoFiltered": "(Filtrado de _MAX_ Proyectos Registrados)",
                "infoPostFix": "",
                "thousands": ",",
                "lengthMenu": "Mostrar _MENU_ Proyectos Registrados",
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

function checar(){
    //alert($("#r1").val());
    //alert($('input:radio[name=optradio]:checked').val());
    //alert($("#r1").chequed);
    $.ajax({
        data : {"Opc" : $('input:radio[name=optradio]:checked').val() , "valor" : $("#txtsrch").val() },
        url : 'PHP/Busqueda.php',
        type : 'POST',
        beforeSend: function(){
            console.log("enviando una solicitud uwu");
        },
        success: function(response){
            console.log(response);
            $("#contenidoTabla").html(response);
        }
    });
}

function CreateRelation(){
    //alert($("#Cvepart option:selected").text());
    $.ajax({
        data:{"opc":4,"cvepart":$("#Cvepart").val(),"cvep":$("#cvep").val(),"mapro":$("#map").val()},
        url: 'PHP/Modelo.php',
        type : 'POST',
        beforeSend : function(){
            console.log("realizando transaccion");
        },
        success : function(response){
            console.log(response);
            $("#resultadosquery").html(response);
            $("#frmResultado").modal('show');
        }
    });
}

function aceptar(val){
    $("#Cvepart").val(val);
    $('#frmBusqueda').modal('hide');
}