$(function(){
  $(".nav-listas").on('change', '.listara',function(e)
  {
    e.preventDefault();
      $('.errores').text('');
      var ide = $(this).val();
      $.ajax({
        url: baseURL+'/index',
        type: 'POST',
        dataType: 'json',
        data: { ide: ide }
      }) 
      .done(function(response){
        if (Boolean(response.result)===true){
          window.location.href = baseURL+"lista/"+response.ide;
        }else{ 
          $('.errores').text(response.mensaje); 
      }
    })
     .fail(function(response){
      console.log("error",response);
    });
  });
});
