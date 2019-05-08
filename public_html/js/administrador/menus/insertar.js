$(function()
{
  $(".modal").on('click', '.btn-ins',function(event){
    event.preventDefault();
       
    $('.errores').text('');
    
    var _this = $(this);
    var _form = _this.closest('.modal').find('form');
	        
    $.ajax({
      url: baseURL+'/insertar',
      type: 'POST',
      dataType: 'json',
      data: _form.serializeArray()
    })
	
    .done(function(response){
    if (Boolean(response.result)===true){
      exito_insertar(response.ide);
    }else{
      $('.errores').text(response.mensaje); 
    }})
	
    .fail(function(response){
      console.log("error",response);
    });
  });
});

function exito_insertar(ide)
{
  var dos = 2000; 
  $("#desare").val("");
  $('#insertar').modal('hide');
  $('#insertarok').modal('show');
  setTimeout(function(){ $('#insertarok').modal('hide');}, dos);
  if(ide)
    setTimeout(function(){ window.location.href = ""+ide;}, dos);
  else
    setTimeout(function(){ window.location.href = "";}, dos);    
}