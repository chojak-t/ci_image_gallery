<?php
    class Gallery extends CI_Controller
    {   
        function index ()
        {
            
            $this->load->model('Gallery_model');
            
            //if user subbmited the form
            if($this->input->post('upload'))
            {
                $this->Gallery_model->upload_file();
            }
            $this->load->view('gallery');
        }
    }
