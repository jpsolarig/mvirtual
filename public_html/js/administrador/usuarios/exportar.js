$(function(){
  $(".modal").on('click', '.exportar-pdf',function(e)
  {
    e.preventDefault();
		var _this = $(this);
		var _form = _this.closest('.modal').find('form');
		$.ajax({
      url: baseURL+'/validar_pdf',
        type: 'POST',
        dataType: 'json',
        data: _form.serializeArray()
    }) 
	
    .done(function(response){
			if (Boolean(response.result)===true) 
			{
				var newWindow = window.open("","_blank"); 
				newWindow.location.href = baseURL+"pdf/"+response.id;
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

