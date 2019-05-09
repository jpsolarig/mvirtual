$(function(){
    $(".persubmenus").on('click', '.permiso',function(e)
    {
      e.preventDefault();
       iderol = $(this).attr("iderol");
       idesis = $(this).attr("idesis");
       idemen = $(this).attr("idemen");
       idesubmen = $(this).attr("idesubmen");
       estsubmen = $(this).attr("estsubmen");
       perimp = $(this).attr("perimp");
       perins = $(this).attr("perins");
       perexp = $(this).attr("perexp");
       peract = $(this).attr("peract");
       pereli = $(this).attr("pereli");
       permiso = $(this).attr("permiso");
       
       if(iderol ==1 && idesis ==1 && idemen ==3 && idesubmen ==7)
       {
            $('#permiso_no').modal('show');
       } 
       else
       {    
            if(iderol ==1 && idesis ==1 && idemen ==3 && idesubmen ==8)
            {
                $('#permiso_no').modal('show');
            } 
            else
            {
                $('#permiso').modal('show');
           
            } 
       }
        
      
          
    });
    
    $('#permiso').on('show.bs.modal', function() 
    {
        $(this).find("input[id='id1']").val(iderol);
        $(this).find("input[id='id2']").val(idesis);
        $(this).find("input[id='id4']").val(idemen);
        $(this).find("input[id='id6']").val(idesubmen);
        $(this).find("input[id='id7']").val(estsubmen);
        $(this).find("input[id='id8']").val(perimp);
        $(this).find("input[id='id9']").val(perins);
        $(this).find("input[id='id10']").val(perexp);
        $(this).find("input[id='id11']").val(peract);
        $(this).find("input[id='id12']").val(pereli);
        $(this).find("input[id='id13']").val(permiso);
    }) 
    
    $("#permiso").on('click', '.btn-permiso',function(e)
    {
        e.preventDefault();
        
        iderol = $("#id1").val();
        idesis = $("#id2").val();
        idemen = $("#id4").val();
        idesubmen = $("#id6").val();
        estsubmen = $("#id7").val();
        perimp = $("#id8").val();
        perins = $("#id9").val();
        perexp = $("#id10").val();
        peract = $("#id11").val();
        pereli = $("#id12").val();
        permiso = $("#id13").val();
        
        $.ajax({
            url: baseURL+'permiso',
            type: 'POST',
            dataType: 'json',
            data: { iderol: iderol, idesis: idesis, idemen: idemen, idesubmen: idesubmen, estsubmen:estsubmen, perimp:perimp, perins:perins, perexp:perexp, peract:peract, pereli:pereli, permiso:permiso}
        }) 
	
        .done(function(response){
            if (Boolean(response.result)===true) 
            {
               
                $('#permiso').modal('hide');
                var uno = 1;
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