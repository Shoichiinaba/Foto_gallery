<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {
	var $template='template/index';
	public function __construct()
    {
		parent::__construct();
		$this->load->helper('url');
	}

	public function index()
	{
		$data['content'] 	='admin/dashboard';
        $this->load->view($this->template, $data);
	}
}
