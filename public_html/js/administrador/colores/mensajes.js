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






  

