var iderol = "";
var estsis = "";
var idesis = "";

$(function(){
  $(".persistemas").on('click', '.permiso',function(e)
  {
    e.preventDefault();
    iderol = $(this).attr("iderol");
    estsis = $(this).attr("estsis");
    idesis = $(this).attr("idesis");
            
    if(iderol ==1 && idesis ==1)
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
    $(this).find("input[id='id3']").val(estsis);
  }) 
    
  $("#permiso").on('click', '.btn-permiso',function(e)
  {
        e.preventDefault();
        
        iderol = $("#id1").val();
        idesis = $("#id2").val();
        estsis = $("#id3").val();
               
       $.ajax({
            url: baseURL+'/permisos',
            type: 'POST',
            dataType: 'json',
            data: { iderol: iderol, idesis: idesis, estsis: estsis}
        }) 
	
        .done(function(response){
            if (Boolean(response.result)===true) 
            {
                 $('#permiso').modal('hide');
                 var uno = 1000;
                 setTimeout(function()
                 { 
                     window.location.href = "";
                     //window.location.href = "./persistemas";
                 }, uno);
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