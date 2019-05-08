$(function(){
  $(".usuarios").on('click', '.idecla',function(e)
  {
    
    e.preventDefault();
      $('.errores').text('');
      var ide = $(this).attr("data-valor");
      $.ajax({
        url: baseURL+'/validar_clave',
        type: 'POST',
        dataType: 'json',
        data: { id: ide }
      }) 
	
      .done(function(response){
      if (Boolean(response.result)===true) 
      {
        $('#clave').modal('show');
        $("#dato_1").val(response.dato_1);
        //$("#dato_2").val(response.dato_2);
       
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
    
    $("#clave").on('click', '.btn-gra',function(e)
    {
       e.preventDefault();
        dato_1 = $("#dato_1").val();
        dato_2 = $("#dato_2").val();
              
        $.ajax({
            url: baseURL+'/grabar_clave',
            type: 'POST',
            dataType: 'json',
            data: { dato_1: dato_1, dato_2: dato_2}
        }) 
	
        .done(function(response){
            if (Boolean(response.result)===true) 
            {
                $('#clave').modal('hide');
                $('#grabar_ok').modal('show');
                
                var tiempo = 2000; 
                setTimeout(function(){ $('#grabar_ok').modal('hide');}, tiempo);
                
                /*alert(response.mensaje)*/
                
                setTimeout(function(){ 
                    window.location.href = "";
                    //window.location.href = baseURL+"lista/"+response.ideare;
                }, tiempo);
                
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