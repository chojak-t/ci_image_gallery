<!DOCTYPE HTML>
<html lang="pl">
    <head>
        <meta charset="UTF-8" />
        <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/style.css'); ?>"/>
        <title>CI simple gallery</title>
    </head>
    <body>
        <h1>gallery</h1>
        <div id="gallery">
            <?php
                if(empty($images)):
            ?>
                <div id="empty_gallery">
                    <p>There is no images in gallery. Use form to upload it.</p>
                </div>
            <?php
                else:
                    foreach ($images as $image): ?>
                        <div class="thumb">
                            <a href="<?php echo $image['url']; ?>">
                                <img src="<?php echo $image['thumb'] ?>" />
                            </a>
                        </div>
                    <?php endforeach; ?>
            <?php endif; ?>
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