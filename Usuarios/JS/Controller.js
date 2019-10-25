$(document).ready(function(){
    recargaTabla();
});
function recargaTabla(){
    $.ajax({
        data:{"opc":3},
        url : 'PHP/model.php',
        type:'POST',
        success:function(response){
            $("#tablaFrame").html(response);
            $('#tablaMaster').DataTable({
            "language": {
                //"url": "//cdn.datatables.net/plug-ins/1.10.15/i18n/Spanish.json"
                "decimal": "",
                "emptyTable": "No hay información",
                "info": "Mostrando _START_ a _END_ de _TOTAL_ Usuarios Registrados",
                "infoEmpty": "Mostrando 0 to 0 of 0 de Usuarios Registradoss",
                "infoFiltered": "(Filtrado de _MAX_ Usuarios Registrados)",
                "infoPostFix": "",
                "thousands": ",",
                "lengthMenu": "Mostrar _MENU_ Usuarios Registrados",
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
function insertar(){
	var contrasena = $("#Contrasena").val();
	var nombreUsuario = $("#NombreUsuario").val();
	var nombreCompleto = $("#NombreCompleto").val();
	var correoElectronico = $("#CorreoElectronico").val();
	if(contrasena === "" || nombreUsuario ==="" || nombreCompleto === "" || correoElectronico === ""){
		alert('Faltan ciertos datos por llenar, verifique');
	}
	else{
		$.ajax({
	        data : {"opc":1,"contrasena":contrasena,
	        "nombreUsuario":nombreUsuario,
	        "nombreCompleto":nombreCompleto,
	        "correoElectronico":correoElectronico},
	        url: 'PHP/model.php',
	        type: 'POST' , 
	        beforeSend : function(){
	            console.log("Usted esta realizando una transaccion en linea == tiene alguna idea de lo que esta haciendo ?");
	        },
	        success: function(response){
	            console.log(response);
	            var quedijo = ""+response+"";
	            if(quedijo==="Datos Registrados Con Exito"){
	            	$("#resultadosInsertado").html(quedijo);
	            }
	            else{
	            	$("#resultadosInsertado").html("Error al insertar el nuevo usuario, probablemente el nombre ya este <br>registrado, si el problema persiste avise al administrador");
	            }
	            alert(quedijo);
	            
	            $("#modalRI").modal("show");
	        }
   	    });	
	}
	
}
function eliminar(id){
	$.ajax({
	        data : {"opc":2,"id":id},
	        url: 'PHP/model.php',
	        type: 'POST' , 
	        beforeSend : function(){
	            console.log("Usted esta realizando una transaccion en linea == tiene alguna idea de lo que esta haciendo ?");
	        },
	        success: function(response){
	            alert(response);
	            console.log(response);
	            recargaTabla();

	        }
   	});	
}

function selecUsuario(cve){
    ////NumPart Monto Desc NumFact NomEmp
    $.ajax({
        data : {"ID" : cve},
        url: 'PHP/detUsuario.php',
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

function actualizar(ID){
	var contrasena = $("#Contrasena").val();
	var nombreUsuario = $("#NombreUsuario").val();
	var nombreCompleto = $("#NombreCompleto").val();
	var correoElectronico = $("#CorreoElectronico").val();
	if(contrasena === "" || nombreUsuario ==="" || nombreCompleto === "" || correoElectronico === ""){
		alert('Faltan ciertos datos por llenar, verifique');
	}
	else{
		$.ajax({
	        data : {"opc":4,"contrasena":contrasena,
	        "nombreUsuario":nombreUsuario,
	        "nombreCompleto":nombreCompleto,
	        "correoElectronico":correoElectronico,"ID":ID},
	        url: 'PHP/model.php',
	        type: 'POST' , 
	        beforeSend : function(){
	            console.log("Usted esta realizando una transaccion en linea == tiene alguna idea de lo que esta haciendo ?");
	        },
	        success: function(response){
	            console.log(response);
	            var quedijo = ""+response+"";
	            if(quedijo==="Datos Registrados Con Exito"){
	            	$("#resultadosInsertado").html(quedijo);
	            }
	            else{
	            	$("#resultadosInsertado").html(quedijo);
	            }
	            document.getElementById('Formulario').style.display='none'
	            $("#modalRI").modal("show");
	        }
   	    });	
	}
}