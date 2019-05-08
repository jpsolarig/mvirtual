var iderol = ""; 
var idemen = ""; //idemen
var estmen = ""; //estmen
var idesis = ""; //idesis
 
$(function(){
    $(".permenus").on('click', '.permiso',function(e)
    {
      e.preventDefault();
       iderol = $(this).attr("iderol");
       idesis = $(this).attr("idesis");
       idemen = $(this).attr("idemen");
       estmen = $(this).attr("estmen");
      
      
        
      
       if(iderol ==1 && idesis ==1 && idemen ==3 && estmen ==1)
       {
            $('#permiso_no').modal('show');
       } 
       else
       {
            $('#permiso').modal('show');
           
       } 
       
    });
    
    $('#permiso').on('show.bs.modal', function() 
    {
        $(this).find("input[id='id1']").val(iderol);
        $(this).find("input[id='id2']").val(idesis);
        $(this).find("input[id='id4']").val(idemen);
        $(this).find("input[id='id5']").val(estmen);
    }) 
    
    $("#permiso").on('click', '.btn-permiso',function(e)
    {
        e.preventDefault();
        
        iderol = $("#id1").val();
        idesis = $("#id2").val();
        idemen = $("#id4").val();
        estmen = $("#id5").val();
       
        
       
        $.ajax({
            url: baseURL+'/permisos',
            //url: baseURL+'permisos',
            type: 'POST',
            dataType: 'json',
            data: { iderol: iderol, idesis: idesis, idemen: idemen, estmen: estmen}
        }) 
	
        .done(function(response){
            if (Boolean(response.result)===true) 
            {
                 $('#alerta_actualizar').modal('hide');
                 var uno = 1000;
                 setTimeout(function(){ window.location.href = "";}, uno);
            }
            else
            { 
                $('.errores').text(response.mensaje); 
            }
        })
	.fail(function(response){
		console.log("error",response);
                alert("falla");
        });
       
    });
        
   
    
});