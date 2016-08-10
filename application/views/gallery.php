<!DOCTYPE HTML>
<html lang="pl">
    <head>
        <meta charset="UTF-8" />
        <title>CI simple gallery</title>
    </head>
    <body>
        <h1>gallery</h1>
        <div id="gallery">
            
        </div>
        <div id="upload">
            <?php
                echo form_open_multipart('gallery');
                echo form_upload('userfile');
                echo form_submit('upload','Załaduj');
                echo form_close();
            ?>
        </div>
    </body>
    
</html>