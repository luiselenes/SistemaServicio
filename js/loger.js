function inseccion(){
    var v = false ; 
    if($("#inputU").val() == "" || $("#inputPassword").val() == ""){
        alert('Faltan ciertos campos por rellenar');
        $("#inputU").focus();
        return ;
    }
    $.ajax({
        data : {"Usuario" : $("#inputU").val() , "contra" : $("#inputPassword").val()},
        url: 'Sesions.php',
        type: 'POST' , 
        beforeSend : function(){
            $("#equivocado").html("Procesando...Espere Porfavor");
        },
        success: function(response){
            //console.log(response);
            $("#equivocado").html(response);
            if(response == "Usuario Valido"){
                document.getElementById('emergente').style.display='block';
            }
            //alert(response);
            //alert($("#equivocado").val());  
        }
    });
   
    
}
function move(){
    $(location).attr('href',"Bienvenida.php");
}