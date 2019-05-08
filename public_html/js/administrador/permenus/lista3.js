$(function(){
   $(".nav-listas").on('change', '.listara3',function(e)
   {
      e.preventDefault();
      $('.errores').text('');
      
        var ide= $("#sel_rol").val();
        var ide2= $("#sel_sis").val();
      
       
        //$(this).find("input[id='sel_sistema']").val(ide);
        //$(this).find("input[id='sel_menu']").val(ide2);
        
       //var ide = $(this).val();
         //alert(ide);
         //alert(ide2);
         
         $.ajax({
            url: baseURL+'/index2',
            type: 'POST',
            dataType: 'json',
            data: { ide: ide , ide2: ide2}
        }) 
         .done(function(response){
            if (Boolean(response.result)===true) 
            {
               window.location.href = baseURL+"lista2/"+response.ide+"/"+response.ide2;
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
