$(function(){
   $(".nav-listas").on('change', '.listara2',function(e)
    {
      e.preventDefault();
      $('.errores').text('');
      
        var ide= $("#sel_rol").val();
        var ide2= $("#sel_sis").val();
        var ide3= $("#sel_menu").val();
          
        $.ajax({
            url: baseURL+'/index3',
            type: 'POST',
            dataType: 'json',
            data: { ide: ide , ide2: ide2, ide3: ide3}
        }) 
         .done(function(response){
            if (Boolean(response.result)===true) 
            {
               window.location.href = baseURL+"lista3/"+response.ide+"/"+response.ide2+"/"+response.ide3;
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
