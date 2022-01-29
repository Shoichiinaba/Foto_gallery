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

    // coding untuk live search di halaman depan
    function filter()
    {
        $output = '';
        $query = '';
        $this->load->model('Katalog_m');
        if ($this->input->post('query')) {
            $query = $this->input->post('query');
        }
        $data = $this->Katalog_m->fetch_data($query);
        $output .= '
        <div class="body table-responsive">
        <table class="table table-condensed">
            <thead>
                <tr class="bg-indigo">
                    <th width="10%">Gambar</th>
                    <th width="15%">Diupload</th>
                    <th width="20%">Action</th>
                </tr>
        ';
        if ($data->num_rows() > 0) {
            foreach ($data->result() as $row) {
                $defaultImage = (strlen($row->default_image) > 0) ? '<img src="' . base_url() . 'uploads/images/' . $row->default_image . '" alt="" />' : '';
                $action = "<a href='" . base_url('Manage_gallery/view/' . $row->id) . "' class='btn bg-indigo waves-effect'>Lihat</a>";
                $output .= '
                        <tr>
                        <td class="thumbnail">' . $defaultImage . '</td>
                        <td>' . $row->created . '</td>
                        <td>' . $action . '</td>
                        </tr>
                ';
            }
        } else {
            $output .= '<tr>
                            <td colspan="5"> Data Tidak Ditemukan </td>
                        </tr>';
        }
        $output .= '</table></div>';
        echo $output;
    }

    function filter2()
    {
        $output = '';
        $query = '';
        $this->load->model('Katalog_m');
        if ($this->input->post('query')) {
            $query = $this->input->post('query');
        }
        $data = $this->Katalog_m->fetch_data2($query);
        $output .= '
        <div class="body table-responsive">
        <table class="table table-condensed">
            <thead>
                <tr class="bg-cyan">
                    <th width="10%">Gambar</th>
                    <th width="25%">Diupload</th>
                    <th width="20%">Action</th>
                </tr>
        ';
        if ($data->num_rows() > 0) {
            foreach ($data->result() as $row) {
                $defaultImage = (strlen($row->default_image) > 0) ? '<img src="' . base_url() . 'uploads/images/' . $row->default_image . '" alt="" />' : '';
                $action = "<a href='" . base_url('Manage_gallery/view/' . $row->id) . "' class='btn bg-cyan waves-effect'>Lihat</a>";
                $output .= '
                        <tr>
                        <td class="thumbnail">' . $defaultImage . '</td>
                        <td>' . $row->created . '</td>
                        <td>' . $action . '</td>
                        </tr>
                ';
            }
        } else {
            $output .= '<tr>
                            <td colspan="5"> Data Tidak Ditemukan </td>
                        </tr>';
        }
        $output .= '</table></div>';
        echo $output;
    }

    function filter3()
    {
        $output = '';
        $query = '';
        $this->load->model('Katalog_m');
        if ($this->input->post('query')) {
            $query = $this->input->post('query');
        }
        $data = $this->Katalog_m->fetch_data3($query);
        $output .= '
        <div class="body table-responsive">
        <table class="table table-condensed">
            <thead>
                <tr class="bg-blue">
                    <th width="10%">Gambar</th>
                    <th width="25%">Diupload</th>
                    <th width="20%">Action</th>
                </tr>
        ';
        if ($data->num_rows() > 0) {
            foreach ($data->result() as $row) {
                $defaultImage = (strlen($row->default_image) > 0) ? '<img src="' . base_url() . 'uploads/images/' . $row->default_image . '" alt="" />' : '';
                $action = "<a href='" . base_url('Manage_gallery/view/' . $row->id) . "' class='btn bg-blue waves-effect'>Lihat</a>";
                $output .= '
                        <tr>
                        <td class="thumbnail">' . $defaultImage . '</td>
                        <td>' . $row->created . '</td>
                        <td>' . $action . '</td>
                        </tr>
                ';
            }
        } else {
            $output .= '<tr>
                            <td colspan="5"> Data Tidak Ditemukan </td>
                        </tr>';
        }
        $output .= '</table></div>';
        echo $output;
    }

    function filter4()
    {
        $output = '';
        $query = '';
        $this->load->model('Katalog_m');
        if ($this->input->post('query')) {
            $query = $this->input->post('query');
        }
        $data = $this->Katalog_m->fetch_data4($query);
        $output .= '
        <div class="body table-responsive">
        <table class="table table-condensed">
            <thead>
                <tr class="bg-light-blue">
                    <th width="10%">Gambar</th>
                    <th width="25%">Diupload</th>
                    <th width="20%">Action</th>
                </tr>
        ';
        if ($data->num_rows() > 0) {
            foreach ($data->result() as $row) {
                $defaultImage = (strlen($row->default_image) > 0) ? '<img src="' . base_url() . 'uploads/images/' . $row->default_image . '" alt="" />' : '';
                $action = "<a href='" . base_url('Manage_gallery/view/' . $row->id) . "' class='btn bg-light-blue waves-effect'>Lihat</a>";
                $output .= '
                        <tr>
                        <td class="thumbnail">' . $defaultImage . '</td>
                        <td>' . $row->created . '</td>
                        <td>' . $action . '</td>
                        </tr>
                ';
            }
        } else {
            $output .= '<tr>
                            <td colspan="5"> Data Tidak Ditemukan </td>
                        </tr>';
        }
        $output .= '</table></div>';
        echo $output;
    }
}
