<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Upload extends CI_Controller {
	var $template='template/index';
	public function __construct()
    {
		parent::__construct();
		$this->load->helper('url');
		$this->load->library('upload');
		$this->load->model('file');
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
}
