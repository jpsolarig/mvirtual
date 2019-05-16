<form action="importar" enctype="multipart/form-data" method="post">
   <input id="archivo" accept=".csv" name="archivo" type="file" /> 
   <input name="MAX_FILE_SIZE" type="hidden" value="20000" /> 
   <input name="enviar" type="submit" value="Importar" />
</form>




<!DOCTYPE html>
<html>
    <head>
            <title></title>
    </head>
    <body>
        <?=form_open_multipart(base_url().'upload/upload_file')?>
        <?=form_upload('file')?>
        <?=form_submit('submit', 'Upload')?>
        <?=form_close()?>
    </body>
</html>
