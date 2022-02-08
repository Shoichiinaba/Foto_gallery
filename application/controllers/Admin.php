<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends AUTH_Controller
{
    var $template = 'template/index';
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->helper('string');
        $this->load->library('upload');

        // Load gallery&admin model
        $this->load->model('gallery');
        $this->load->model('M_admin');
    }

    public function index()
    {
        $data['title'] = 'dashboard';
        $data['content'] = 'admin/dashboard';
        $data['userdata'] = $this->userdata;
        $this->load->view($this->template, $data);
    }

    public function List_upload()
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

        // Load the list page view
        $data['gallery'] = $this->gallery->getRows();
        $data['title'] = 'Gallery Archive';
        $data['userdata'] = $this->userdata;
        $data['content'] = 'admin/daftar_upload';
        $this->load->view($this->template, $data);
    }
    public function tampil($id)
    {
        $data = array();

        // Check whether id is not empty
        if (!empty($id)) {
            $data['gallery'] = $this->gallery->getRows($id);
            $data['title'] = $data['gallery']['title'];
            $data['content']     = 'admin/gallery_up';
            $data['userdata'] = $this->userdata;
            $this->load->view($this->template, $data);
        } else {
            return redirect('Admin/tampil');
        }
    }
    // upload gallery
    public function add()
    {
        $data = $galleryData = array();
        $errorUpload = '';

        // If add request is submitted
        if ($this->input->post('imgSubmit')) {
            $this->form_validation->set_rules('images', 'required');

            // Prepare gallery data
            $galleryData = array(
                'title' => $this->session->userdata('userdata')->role,
                'user_id' => $this->session->userdata('userdata')->id
            );

            // Validate submitted form data
            if (!$this->form_validation->run() == true) {
                // Insert gallery data
                $insert = $this->gallery->insert($galleryData);
                $galleryID = $insert;

                $errorsData = [];
                if ($insert) {
                    if (!empty($_FILES['images']['name'])) {
                        $filesCount = count($_FILES['images']['name']);
                        for ($i = 0; $i < $filesCount; $i++) {
                            $_FILES['file']['name']     = $_FILES['images']['name'][$i];
                            $_FILES['file']['type']     = $_FILES['images']['type'][$i];
                            $_FILES['file']['tmp_name'] = $_FILES['images']['tmp_name'][$i];
                            $_FILES['file']['error']    = $_FILES['images']['error'][$i];
                            $_FILES['file']['size']     = $_FILES['images']['size'][$i];

                            $pathName = $_FILES['file']['name'];

                            // File upload configuration
                            $uploadPath = 'uploads/images/';
                            $config['file_name'] = random_string('alnum', 16) . '_' . $pathName . '.' . pathinfo($pathName, PATHINFO_EXTENSION);
                            $config['upload_path'] = $uploadPath;
                            $config['allowed_types'] = 'jpg|jpeg|png|gif';
                            // Load and initialize upload library
                            $this->load->library('upload', $config);
                            $this->upload->initialize($config);

                            // Upload file to server
                            if (!$this->upload->do_upload('file')) {
                                // Uploaded file data
                                $error = [
                                    'status' => 'Upload Error',
                                    'message' => $this->upload->display_errors()
                                ];
                                $errorsData[] = $error;
                            } else {
                                $fileData = $this->upload->data();
                                $compressImage = $this->resizeImage($fileData['file_name']);
                                if (is_array($compressImage) && ($compressImage['status'] == 'error compress')) {
                                    $errorsData[] = $compressImage;
                                } else {
                                    $uploadData[$i]['gallery_id'] = $galleryID;
                                    $uploadData[$i]['file_name'] = $fileData['file_name'];
                                    $uploadData[$i]['uploaded_on'] = format_indo(date('Y-m-d H:i:s'));
                                }
                            }
                        } // end for

                        // File upload error message
                        $errorUpload = !empty($errorUpload) ? ' Upload Error: ' . trim($errorUpload, ' | ') : '';

                        if (!empty($uploadData) && (count($errorsData) == 0)) {
                            // Insert files info into the database
                            $insert = $this->gallery->insertImage($uploadData);
                        }
                    }

                    $this->session->set_userdata('success_msg', 'Gallery Baru Berhasil Ditambahkan.' . $errorUpload);
                    return redirect('Admin/List_upload');
                } else {
                    $data['error_msg'] = 'Ada masalah dalam proses Upload, Mohon Ulangi Lagi.';
                }
            } // end if validation
        }

        $data['gallery'] = $galleryData;
        $data['title'] = 'Upload Gallery';
        $data['action'] = 'Add';

        // Load the add page view
        $data['content']     = 'admin/add-edit';
        $data['userdata'] = $this->userdata;
        $this->load->view($this->template, $data);
    }

    public function resizeImage($filename)
    {
        $source_path = 'uploads/images/' . $filename;
        $target_path = 'uploads/images/';
        $config = [
            'image_library' => 'gd2',
            'source_image' => $source_path,
            'new_image' => $target_path,
            'maintain_ratio' => TRUE,
            'quality' => '20%',
            // 'width' => 500,
            // 'height' => 500,
        ];
        $this->load->library('image_lib', $config);
        if (!$this->image_lib->resize()) {
            return [
                'status' => 'error compress',
                'message' => $this->image_lib->display_errors()
            ];
        }
        $this->image_lib->clear();
        return 1;
        // die('berhasil');
    }

    public function edit($id)
    {
        $data = $galleryData = array();
        $errorUpload = '';

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
                                // $errorUpload .= $fileImages[$key] . '(' . $this->upload->display_errors('', '') . ') | ';
                            }
                        }

                        // File upload error message
                        $errorUpload = !empty($errorUpload) ? 'Upload Error: ' . trim($errorUpload, ' | ') : '';

                        if (!empty($uploadData)) {
                            // Insert files data into the database
                            $insert = $this->gallery->insertImage($uploadData);
                        }
                    }

                    $this->session->set_userdata('success_msg', 'Gallery Berhasil DI Ubah.' . $errorUpload);
                    return redirect('Admin/List_upload');
                } else {
                    $data['error_msg'] = 'Some problems occurred, please try again.';
                }
            }
        }


        $data['gallery'] = $galleryData;
        $data['title'] = 'Update Gallery';
        $data['action'] = 'Edit';
        $data['userdata'] = $this->userdata;

        // Load the add page view
        $data['content']     = 'admin/add-edit';
        $data['userdata'] = $this->userdata;
        $this->load->view($this->template, $data);
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

                $this->session->set_userdata('success_msg', 'Gallery berhasil di hapus.');
            } else {
                $this->session->set_userdata('error_msg', 'ada masalah mohon ulangi lagi.');
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

    public function tambah_admin()
    {
        $this->form_validation->set_rules('username', 'Username', 'required|trim|is_unique[admin.username]', [
            'is_unique' => 'Username sudah terdaftar!'
        ]);
        $this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[3]|matches[password2]', [
            'matches' => 'Password harus sama!',
            'min_length' => 'Password terlalu pendek!'
        ]);
        $this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password1]');
        $this->form_validation->set_rules('nama', 'Nama', 'required|trim');
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[admin.email]', [
            'is_unique' => 'email sudah terdaftar!'
        ]);
        $this->form_validation->set_rules('role', 'Role', 'required|trim');

        if ($this->form_validation->run() == false) {
            // $this->session->set_flashdata('error', "Maaf Anda Gagal Registrasi");
            // redirect('admin/tambah_admin');

            $data['title']    = 'Daftar Admin Baru';
            $data['content']  = 'admin/daftar';
            $data['userdata'] = $this->userdata;
            $this->load->view($this->template, $data);
        } else {

            $data = [

                'username' => $this->input->post('username'),
                'password' => md5($this->input->post('password1')),
                'nama' => $this->input->post('nama'),
                'email' => $this->input->post('email'),
                'foto' => 'default.png',
                'role' => $this->input->post('role'),
                'dibuat' => date("Y-m-d H:i:s"),
            ];
            $this->db->insert('admin', $data);
            $this->session->set_flashdata('success_msg', 'Data Admin Baru Berhasil Ditambahkan');
            redirect('admin/list_admin');
        }
    }

    public function list_admin()
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

        $data['title']      = 'Daftar Admin Baru';
        $data['content']    = 'admin/list_admin';
        $data['list']       = $this->M_admin->get_data_admin();
        $data['userdata']   = $this->userdata;
        $this->load->view($this->template, $data);
    }
    function hapus_admin($params = '')
    {
        $this->M_admin->hapus($params);
        $this->session->set_userdata('success_msg', 'Data Admin Berhasil dihapus.');
        return redirect('Admin/list_admin');
    }
}
