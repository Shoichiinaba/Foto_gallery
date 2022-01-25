<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Manage_gallery extends CI_Controller
{
    var $template = 'templates/index';

    function __construct()
    {
        parent::__construct();

        // Load form helper and form validation library
        $this->load->helper('form');
        $this->load->library('form_validation');

        // Load gallery model
        $this->load->model('gallery');
        $this->load->model('Katalog_m');

        // Default controller name
        $this->controller = 'manage_gallery';
    }

    public function index()
    {

        $data = array();

        // Get messages from the session
        if ($this->session->userdata('success_msg')) {
            $data['success_msg'] = $this->session->userdata('success_msg');
            $this->session->unset_userdata('success_msg');
        }
        if ($this->session->userdata('error_msg')) {
            $data['error_msg'] = $this->session->userdata('error_msg');
            $this->session->unset_userdata('error_msg');
        }

        $data['toko']    = $this->Katalog_m->get_toko();
        $data['content']    = 'gallery/home';
        $this->load->view($this->template, $data);
    }
    public function Katalog()
    {
        //--!!design awal!!--
        // $data = array();

        // // Get messages from the session
        // if ($this->session->userdata('success_msg')) {
        //     $data['success_msg'] = $this->session->userdata('success_msg');
        //     $this->session->unset_userdata('success_msg');
        // }
        // if ($this->session->userdata('error_msg')) {
        //     $data['error_msg'] = $this->session->userdata('error_msg');
        //     $this->session->unset_userdata('error_msg');
        // }

        // $data['gallery'] = $this->gallery->getRows();
        // $data['title'] = 'Katalog Gallery';

        // // Load the list page view
        // $this->load->view('templates/header', $data);
        // $this->load->view('templates/main', $data);
        // $this->load->view('gallery/index', $data);
        // $this->load->view('templates/footer');

        // design setelah uji exprience dengan user
        $data = array();

        // Get messages from the session
        if ($this->session->userdata('success_msg')) {
            $data['success_msg'] = $this->session->userdata('success_msg');
            $this->session->unset_userdata('success_msg');
        }
        if ($this->session->userdata('error_msg')) {
            $data['error_msg'] = $this->session->userdata('error_msg');
            $this->session->unset_userdata('error_msg');
        }

        $data['gallery']    = $this->Katalog_m->get_kategori1();
        $data['gallery2']   = $this->Katalog_m->get_kategori2();
        $data['gallery3']   = $this->Katalog_m->get_kategori3();
        $data['title']      = 'Gallery Archive';
        $data['content']    = 'gallery/Katalog_prod';
        $this->load->view($this->template, $data);
    }


    public function view($id)
    {
        $data = array();

        // Check whether id is not empty
        if (!empty($id)) {
            $data['gallery'] = $this->Katalog_m->getRows($id);
            $data['title'] = $data['gallery']['title'];
            $data['content']     = 'gallery/view';
            $this->load->view($this->template, $data);
        } else {
            return redirect('Manage_gallery');
        }
    }
}
