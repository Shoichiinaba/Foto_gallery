<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {
	var $template='template/index';
	public function __construct()
    {
		parent::__construct();
		$this->load->helper('url');
		$this->load->library('upload');
        // Load form helper and form validation library
        $this->load->helper('form');
        $this->load->library('form_validation');
        // Load gallery model
        $this->load->model('gallery');
        // Default controller name
	}

	public function index()
	{
		$data['content'] 	='admin/upload_view';
        $this->load->view($this->template, $data);
	}

	function dragDropUpload(){
        if(!empty($_FILES)){
            // File upload configuration
            $uploadPath = 'uploads/';
            $config['upload_path'] = $uploadPath;
            $config['allowed_types'] = '*';

            // Load and initialize upload library
            $this->load->library('upload', $config);
            $this->upload->initialize($config);

            // Upload file to the server
            if($this->upload->do_upload('file')){
                $fileData = $this->upload->data();
                $uploadData['file_name'] = $fileData['file_name'];
                $uploadData['uploaded_on'] = date("Y-m-d H:i:s");

                // Insert files info into the database
                $insert = $this->file->insert($uploadData);
            }
        }
	}
    public function List_upload()
	{
        $data = array();

        // Get messages from the session
        if($this->session->userdata('success_msg')){
            $data['success_msg'] = $this->session->userdata('success_msg');
            $this->session->unset_userdata('success_msg');
        }
        if($this->session->userdata('error_msg')){
            $data['error_msg'] = $this->session->userdata('error_msg');
            $this->session->unset_userdata('error_msg');
        }

        // Load the list page view
        $data['gallery'] = $this->gallery->getRows();
        $data['title'] = 'Gallery Archive';
		$data['content'] 	='admin/daftar_upload';
        $this->load->view($this->template, $data);
	}
}
