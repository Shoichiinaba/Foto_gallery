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

    public function add()
    {
        $data = $galleryData = array();
        $errorUpload = '';

        // If add request is submitted
        if ($this->input->post('imgSubmit')) {
            // Form field validation rules
            $this->form_validation->set_rules('title', 'gallery title', 'required');

            // Prepare gallery data
            $galleryData = array(
                'title' => $this->input->post('title')
            );

            // Validate submitted form data
            if ($this->form_validation->run() == true) {
                // Insert gallery data
                $insert = $this->gallery->insert($galleryData);
                $galleryID = $insert;

                if ($insert) {
                    if (!empty($_FILES['images']['name'])) {
                        $filesCount = count($_FILES['images']['name']);
                        for ($i = 0; $i < $filesCount; $i++) {
                            $_FILES['file']['name']     = $_FILES['images']['name'][$i];
                            $_FILES['file']['type']     = $_FILES['images']['type'][$i];
                            $_FILES['file']['tmp_name'] = $_FILES['images']['tmp_name'][$i];
                            $_FILES['file']['error']    = $_FILES['images']['error'][$i];
                            $_FILES['file']['size']     = $_FILES['images']['size'][$i];

                            // File upload configuration
                            $uploadPath = 'uploads/images/';
                            $config['upload_path'] = $uploadPath;
                            $config['allowed_types'] = 'jpg|jpeg|png|gif';

                            // Load and initialize upload library
                            $this->load->library('upload', $config);
                            $this->upload->initialize($config);

                            // Upload file to server
                            if ($this->upload->do_upload('file')) {
                                // Uploaded file data
                                $fileData = $this->upload->data();
                                $uploadData[$i]['gallery_id'] = $galleryID;
                                $uploadData[$i]['file_name'] = $fileData['file_name'];
                                $uploadData[$i]['uploaded_on'] = format_indo(date('Y-m-d H:i:s'));
                            } else {
                                $errorUpload .= $fileImages[$key] . '(' . $this->upload->display_errors('', '') . ') | ';
                            }
                        }

                        // File upload error message
                        $errorUpload = !empty($errorUpload) ? ' Upload Error: ' . trim($errorUpload, ' | ') : '';

                        if (!empty($uploadData)) {
                            // Insert files info into the database
                            $insert = $this->gallery->insertImage($uploadData);
                        }
                    }

                    $this->session->set_userdata('success_msg', 'Gallery has been added successfully.' . $errorUpload);
                    return redirect('Admin/List_upload');
                } else {
                    $data['error_msg'] = 'Some problems occurred, please try again.';
                }
            }
        }

        $data['gallery'] = $galleryData;
        $data['title'] = 'Create Gallery';
        $data['action'] = 'Add';

        // Load the add page view
        $data['content']     = 'gallery/add-edit';
        $this->load->view($this->template, $data);
    }

    public function edit($id)
    {
        $data = $galleryData = array();

        // Get gallery data
        $galleryData = $this->gallery->getRows($id);

        // If update request is submitted
        if ($this->input->post('imgSubmit')) {
            // Form field validation rules
            $this->form_validation->set_rules('title', 'gallery title', 'required');

            // Prepare gallery data
            $galleryData = array(
                'title' => $this->input->post('title')
            );

            // Validate submitted form data
            if ($this->form_validation->run() == true) {
                // Update gallery data
                $update = $this->gallery->update($galleryData, $id);

                if ($update) {
                    if (!empty($_FILES['images']['name'])) {
                        $filesCount = count($_FILES['images']['name']);
                        for ($i = 0; $i < $filesCount; $i++) {
                            $_FILES['file']['name']     = $_FILES['images']['name'][$i];
                            $_FILES['file']['type']     = $_FILES['images']['type'][$i];
                            $_FILES['file']['tmp_name'] = $_FILES['images']['tmp_name'][$i];
                            $_FILES['file']['error']    = $_FILES['images']['error'][$i];
                            $_FILES['file']['size']     = $_FILES['images']['size'][$i];

                            // File upload configuration
                            $uploadPath = 'uploads/images/';
                            $config['upload_path'] = $uploadPath;
                            $config['allowed_types'] = 'jpg|jpeg|png|gif';

                            // Load and initialize upload library
                            $this->load->library('upload', $config);
                            $this->upload->initialize($config);

                            // Upload file to server
                            if ($this->upload->do_upload('file')) {
                                // Uploaded file data
                                $fileData = $this->upload->data();
                                $uploadData[$i]['gallery_id'] = $id;
                                $uploadData[$i]['file_name'] = $fileData['file_name'];
                                $uploadData[$i]['uploaded_on'] = date("Y-m-d H:i:s");
                            } else {
                                $errorUpload .= $fileImages[$key] . '(' . $this->upload->display_errors('', '') . ') | ';
                            }
                        }

                        // File upload error message
                        $errorUpload = !empty($errorUpload) ? 'Upload Error: ' . trim($errorUpload, ' | ') : '';

                        if (!empty($uploadData)) {
                            // Insert files data into the database
                            $insert = $this->gallery->insertImage($uploadData);
                        }
                    }

                    $this->session->set_userdata('success_msg', 'Gallery has been updated successfully.' . $errorUpload);
                    return redirect('Admin/List_upload');
                } else {
                    $data['error_msg'] = 'Some problems occurred, please try again.';
                }
            }
        }


        $data['gallery'] = $galleryData;
        $data['title'] = 'Update Gallery';
        $data['action'] = 'Edit';

        // Load the edit page view
        $this->load->view('templates/header', $data);
        $this->load->view('gallery/add-edit', $data);
        $this->load->view('templates/footer');
    }

    public function block($id)
    {
        // Check whether gallery id is not empty
        if ($id) {
            // Update gallery status
            $data = array('status' => 0);
            $update = $this->gallery->update($data, $id);

            if ($update) {
                $this->session->set_userdata('success_msg', 'Gallery has been blocked successfully.');
            } else {
                $this->session->set_userdata('error_msg', 'Some problems occurred, please try again.');
            }
        }

        return redirect('Admin/List_upload');
    }

    public function unblock($id)
    {
        // Check whether gallery id is not empty
        if ($id) {
            // Update gallery status
            $data = array('status' => 1);
            $update = $this->gallery->update($data, $id);

            if ($update) {
                $this->session->set_userdata('success_msg', 'Gallery has been activated successfully.');
            } else {
                $this->session->set_userdata('error_msg', 'Some problems occurred, please try again.');
            }
        }

        return redirect('Admin/List_upload');
    }

    public function delete($id)
    {
        // Check whether id is not empty
        if ($id) {
            $galleryData = $this->gallery->getRows($id);

            // Delete gallery data
            $delete = $this->gallery->delete($id);

            if ($delete) {
                // Delete images data
                $condition = array('gallery_id' => $id);
                $deleteImg = $this->gallery->deleteImage($condition);

                // Remove files from the server
                if (!empty($galleryData['images'])) {
                    foreach ($galleryData['images'] as $img) {
                        @unlink('uploads/images/' . $img['file_name']);
                    }
                }

                $this->session->set_userdata('success_msg', 'Gallery has been removed successfully.');
            } else {
                $this->session->set_userdata('error_msg', 'Some problems occurred, please try again.');
            }
        }

        return redirect('Admin/List_upload');
    }

    public function deleteImage()
    {
        $status  = 'err';
        // If post request is submitted via ajax
        if ($this->input->post('id')) {
            $id = $this->input->post('id');
            $imgData = $this->gallery->getImgRow($id);

            // Delete image data
            $con = array('id' => $id);
            $delete = $this->gallery->deleteImage($con);

            if ($delete) {
                // Remove files from the server
                @unlink('uploads/images/' . $imgData['file_name']);
                $status = 'ok';
            }
        }
        echo $status;
        die;
    }
}
