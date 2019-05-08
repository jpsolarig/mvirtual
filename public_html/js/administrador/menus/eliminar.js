var ide = "";
var ide2 = "";
var ide3 = "";

$(function(){
    $(".menus").on('click', '.ideeli',function(e)
    {
      e.preventDefault();
      ide = $(this).attr("data-eli");
      ide2 = $(this).attr("data-eli2");
      ide3 = $(this).attr("data-eli3");
      ide4 = $(this).attr("data-eli4");
       
                                                                                         
       $('#eliminar').modal('show');
       $( ".errores" ).empty();
    });
    
    $('#eliminar').on('show.bs.modal', function() 
    {
        $(this).find("input[id='eliide']").val(ide);
        $(this).find("input[id='eliide2']").val(ide2);
        $(this).find("input[id='eliide3']").val(ide3);
        $(this).find("input[id='eliide4']").val(ide4);
    }) 
    
    $("#eliminar").on('click', '.btn-eli',function(e)
    {
        e.preventDefault();
        var eliide= $("#eliide").val();
        var eliide2= $("#eliide2").val();
        var eliide3= $("#eliide3").val();
        var eliide4= $("#eliide4").val();
      
	$.ajax({
            url: baseURL+'/eliminar',
            type: 'POST',
            dataType: 'json',
            data: { eliide: eliide, eliide2: eliide2, eliide3: eliide3, eliide4: eliide4 }
        }) 
	
        .done(function(response){
            if (Boolean(response.result)===true) 
            {
                
                $('#eliminar').modal('hide');
                $('#eliminarok').modal('show');
                            
                var dos = 2000; 
                setTimeout(function(){ $('#eliminarok').modal('hide');}, dos);
                setTimeout(function(){ window.location.href = "";}, dos);
               
            }
            else
            { 
                $('.errores').text(response.mensaje); 
            }
        })
	.fail(function(response){
		console.log("error",response);
        });
    });
});

