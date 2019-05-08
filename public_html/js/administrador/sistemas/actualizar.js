$(function(){
  $(".sistemas").on('click', '.ideact',function(e)
  {
    e.preventDefault();
    $('.errores').text('');
    var ide = $(this).attr("data-valor");
    $.ajax({
      url: baseURL+'/validar_act',
      type: 'POST',
      dataType: 'json',
      data: { id: ide }
    }) 
	
    .done(function(response){
      if (Boolean(response.result)===true) 
        {
          $('#actualizar').modal('show');
          $("#dato_1").val(response.dato_1);
          $("#dato_2").val(response.dato_2);
          $("#dato_3").val(response.dato_3);
          $("#dato_4").val(response.dato_4);
          $("#dato_5").val(response.dato_5);
          $("#dato_6").val(response.dato_6);
          $("#dato_7").val(response.dato_7);
          $("#dato_8").val(response.dato_8);
          //$("#dato_9").val(response.dato_9);
        }
        else
        { 
          $('.errores').text(response.mensaje); 
        }
    })
         
    .fail(function(response){console.log("error",response);});
  });
    
  $("#actualizar").on('click', '.btn-gra',function(e)
  {
    e.preventDefault();
    dato_1 = $("#dato_1").val();
    dato_2 = $("#dato_2").val();
    dato_3 = $("#dato_3").val();
    dato_4 = $("#dato_4").val();
    dato_5 = $("#dato_5").val();
    dato_6 = $("#dato_6").val();
    dato_7 = $("#dato_7").val();
    dato_8 = $("#dato_8").val();
        
    
        
    $.ajax({
      url: baseURL+'/actualizar',
      type: 'POST',
      dataType: 'json',
      data: { dato_1: dato_1, dato_2: dato_2, dato_3: dato_3, dato_4: dato_4, dato_5: dato_5, dato_6: dato_6, dato_7: dato_7, dato_8: dato_8}
    }) 
	
    .done(function(response){
      if (Boolean(response.result)===true) 
      {
        $('#actualizar').modal('hide');
        $('#grabar_ok').modal('show');
                
        var tiempo = 2000; 
        setTimeout(function(){ $('#grabar_ok').modal('hide');}, tiempo);
                
        setTimeout(function(){ 
          window.location.href = "";
        }, tiempo);
                
      }
      else
      { 
        $('.errores').text(response.mensaje); 
      }
    })
    .fail(function(response){console.log("error",response);});
  });
    
});
