$(function(){
   $(".modal").on('change', '.sel_menu',function(event){
     
      event.preventDefault();
      ide = $(".sel_sis").val();
      ide2 = this.value ; 
      
      
      
    
      $.ajax({
         url: baseURL+'/llenar_submenus',
         type: 'POST',
         dataType: 'json',
         data: { id: ide, id1: ide2 }
      })
      .done(function(response){
         if (Boolean(response.result)===true) 
         {
            $('.sel_submenu').html(response.select); 
         }else{
         $('.errores').text(response.mensaje); 
      }})
      .fail(function(response){
         console.log("error",response);
      });
   });
});  
    
    

  