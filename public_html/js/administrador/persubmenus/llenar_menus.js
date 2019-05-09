$(function(){
   $(".modal").on('change', '.sel_sis',function(event){
      event.preventDefault();
      ide = this.value ; 
      
      $.ajax({
         url: baseURL+'/llenar_menus',
         type: 'POST',
         dataType: 'json',
         data: { id: ide }
      })
      .done(function(response){
         if (Boolean(response.result)===true) 
         {
            $('.sel_menu').html(response.select); 
         }else{
         $('.errores').text(response.mensaje); 
      }})
      .fail(function(response){
         console.log("error",response);
      });
   });
});  
    
    

  