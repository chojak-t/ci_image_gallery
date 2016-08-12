<?php
    class Gallery_model extends CI_model
    {
        
        private $gallery_path;
        private $thumbs_path;
        
        function Gallery_model ()
        {
            parent::__construct();
            //we want images folder outside application folder
            //APPPATH points to something like that: C:\xampp\htdocs\ci_image_gallery\application\
            //so we need to add .. to go up one level
            //to get ride of .. we nedd to apply realpath php function
            
            $this->gallery_path = realpath(APPPATH . '../images/');
            $this->thumbs_path = $this->gallery_path . '/thumbs';
        }
        
        function upload_file()
        {
            $config = array(
                'allowed_types' => 'jpg|jpeg|gif|png|bmp',
                'upload_path' => $this->gallery_path
                );
            
            $this->load->library('upload', $config);
            
            //do upload
            if (!$this->upload->do_upload('userfile')) //userfile is the name of form`s field
                {
                        echo $this->upload->display_errors();
                }
                else
                {
                    //upload ok
                    //image_data contains info about latest uploaded picture (path, dimensions, etc.)
                    $image_data = $this->upload->data();

                    //config for thumbnails                        
                    $config = array(
                        'source_image' => $image_data['full_path'],
                        'new_image' => $this->thumbs_path,
                        'maintain_ratio' => TRUE,
                        'width' => 150
                    );
                    
                    //creating thumbnails
                    $this->load->library('image_lib', $config);
                    $this->image_lib->resize();
                    
                }
        }
    }
?>