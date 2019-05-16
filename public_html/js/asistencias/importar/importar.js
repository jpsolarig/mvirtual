alert(1);

$(function(){
    $("#import_csv").on('submit', function(e)
    {
        e.preventDefault();
       alert(2);
        
        $.ajax({
            url: baseURL+'/importar',
            method:"POST",
            data: new FormData(this),
            contentType:false,
            cache:false,
            processData:false,
          beforeSend:function(){
            $('#import_csv_btn').html('Importing...');
          },
          success:function(data)
          {
            $('#import_csv')[0].reset();
            $('#import_csv_btn').attr('disabled', false);
            $('#import_csv_btn').html('OK');
            $('#import_csv_btn').removeClass("btn-primary").addClass("btn-success");
          }
      }) 
        .done(function(response){
            if (Boolean(response.result)===true){
                alert(response.tipo);
            }else{ 
               $('.errores').text(response.mensaje); 
            }
         })
              
      
       
      
   });
});


/*

   
   
   
   
   
   beforeSend:function(){
    $('#import_csv_btn').html('Importing...');
   },
   success:function(data)
   {
    $('#import_csv')[0].reset();
    $('#import_csv_btn').attr('disabled', false);
    $('#import_csv_btn').html('OK');
    $('#import_csv_btn').removeClass("btn-primary").addClass("btn-success");

    load_data();
   }
  })
 });
 
});
*/