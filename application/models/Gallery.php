<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Gallery extends CI_Model
{

    function __construct()
    {
        $this->galleryTbl   = 'gallery';
        $this->imgTbl = 'gallery_images';
        $this->tokoTbl = 'toko';
    }

    // Fetch gallery data from the database
    public function getRows($id = '')
    {
        $id_user = $this->session->userdata('userdata')->role;
        $id_toko = $this->session->userdata('userdata')->id_toko;
        $this->db->select("*, (SELECT file_name FROM " . $this->imgTbl . " WHERE gallery_id = " . $this->galleryTbl . ".id ORDER BY id DESC LIMIT 1) as default_image");
        $this->db->from($this->galleryTbl);
        $this->db->where('title', $id_user);
        $this->db->where('id_toko', $id_toko);
        if ($id) {
            $this->db->where('id', $id);
            $query  = $this->db->get();
            $result = ($query->num_rows() > 0) ? $query->row_array() : array();

            if (!empty($result)) {
                $this->db->select('*');
                $this->db->from($this->imgTbl);
                $this->db->where('gallery_id', $result['id']);
                $this->db->order_by('id', 'desc');
                $query  = $this->db->get();
                $result2 = ($query->num_rows() > 0) ? $query->result_array() : array();
                $result['images'] = $result2;
            }
        } else {
            $this->db->order_by('id', 'desc');
            $query  = $this->db->get();
            $result = ($query->num_rows() > 0) ? $query->result_array() : array();
        }

        // return fetched data
        return !empty($result) ? $result : false;
    }

    public function getRowsspv($id = '', $title = '75')
    {
        $id_user = $this->session->userdata('userdata')->role;
        $this->db->select("*, (SELECT file_name FROM " . $this->imgTbl . " WHERE gallery_id = " . $this->galleryTbl . ".id ORDER BY id DESC LIMIT 1) as default_image");
        $this->db->from($this->galleryTbl);
        $this->db->where('title', $title);
        if ($id) {
            $this->db->where('id', $id);
            $query  = $this->db->get();
            $result = ($query->num_rows() > 0) ? $query->row_array() : array();

            if (!empty($result)) {
                $this->db->select('*');
                $this->db->from($this->imgTbl);
                $this->db->where('gallery_id', $result['id']);
                $this->db->order_by('id', 'desc');
                $query  = $this->db->get();
                $result2 = ($query->num_rows() > 0) ? $query->result_array() : array();
                $result['images'] = $result2;
            }
        } else {
            $this->db->order_by('id', 'desc');
            $query  = $this->db->get();
            $result = ($query->num_rows() > 0) ? $query->result_array() : array();
        }

        // return fetched data
        return !empty($result) ? $result : false;
    }

    public function getRowsspv300($id = '', $title = '300')
    {
        $id_user = $this->session->userdata('userdata')->role;
        $this->db->select("*, (SELECT file_name FROM " . $this->imgTbl . " WHERE gallery_id = " . $this->galleryTbl . ".id ORDER BY id DESC LIMIT 1) as default_image");
        $this->db->from($this->galleryTbl);
        $this->db->where('title', $title);
        if ($id) {
            $this->db->where('id', $id);
            $query  = $this->db->get();
            $result = ($query->num_rows() > 0) ? $query->row_array() : array();

            if (!empty($result)) {
                $this->db->select('*');
                $this->db->from($this->imgTbl);
                $this->db->where('gallery_id', $result['id']);
                $this->db->order_by('id', 'desc');
                $query  = $this->db->get();
                $result2 = ($query->num_rows() > 0) ? $query->result_array() : array();
                $result['images'] = $result2;
            }
        } else {
            $this->db->order_by('id', 'desc');
            $query  = $this->db->get();
            $result = ($query->num_rows() > 0) ? $query->result_array() : array();
        }

        // return fetched data
        return !empty($result) ? $result : false;
    }

    public function getRowsspv420($id = '', $title = '420')
    {
        $id_user = $this->session->userdata('userdata')->role;
        $this->db->select("*, (SELECT file_name FROM " . $this->imgTbl . " WHERE gallery_id = " . $this->galleryTbl . ".id ORDER BY id DESC LIMIT 1) as default_image");
        $this->db->from($this->galleryTbl);
        $this->db->where('title', $title);
        if ($id) {
            $this->db->where('id', $id);
            $query  = $this->db->get();
            $result = ($query->num_rows() > 0) ? $query->row_array() : array();

            if (!empty($result)) {
                $this->db->select('*');
                $this->db->from($this->imgTbl);
                $this->db->where('gallery_id', $result['id']);
                $this->db->order_by('id', 'desc');
                $query  = $this->db->get();
                $result2 = ($query->num_rows() > 0) ? $query->result_array() : array();
                $result['images'] = $result2;
            }
        } else {
            $this->db->order_by('id', 'desc');
            $query  = $this->db->get();
            $result = ($query->num_rows() > 0) ? $query->result_array() : array();
        }

        // return fetched data
        return !empty($result) ? $result : false;
    }

    public function getRowsspv700($id = '', $title = '700')
    {
        $id_user = $this->session->userdata('userdata')->role;
        $this->db->select("*, (SELECT file_name FROM " . $this->imgTbl . " WHERE gallery_id = " . $this->galleryTbl . ".id ORDER BY id DESC LIMIT 1) as default_image");
        $this->db->from($this->galleryTbl);
        $this->db->where('title', $title);
        if ($id) {
            $this->db->where('id', $id);
            $query  = $this->db->get();
            $result = ($query->num_rows() > 0) ? $query->row_array() : array();

            if (!empty($result)) {
                $this->db->select('*');
                $this->db->from($this->imgTbl);
                $this->db->where('gallery_id', $result['id']);
                $this->db->order_by('id', 'desc');
                $query  = $this->db->get();
                $result2 = ($query->num_rows() > 0) ? $query->result_array() : array();
                $result['images'] = $result2;
            }
        } else {
            $this->db->order_by('id', 'desc');
            $query  = $this->db->get();
            $result = ($query->num_rows() > 0) ? $query->result_array() : array();
        }

        // return fetched data
        return !empty($result) ? $result : false;
    }

    // Detail Gallery
    public function getImgRow($id)
    {
        $this->db->select('*');
        $this->db->from($this->imgTbl);
        $this->db->where('id', $id);
        $query  = $this->db->get();
        return ($query->num_rows() > 0) ? $query->row_array() : false;
    }


    public function insert($data = array())
    {
        if (!empty($data)) {
            // Add created and modified date if not included
            if (!array_key_exists("created", $data)) {
                $data['created'] = date("Y-m-d H:i:s");
            }
            if (!array_key_exists("modified", $data)) {
                $data['modified'] = date("Y-m-d H:i:s");
            }

            // Insert gallery data
            $insert = $this->db->insert($this->galleryTbl, $data);

            // Return the status
            return $insert ? $this->db->insert_id() : false;
        }
        return false;
    }

    public function insertImage($data = array())
    {
        if (!empty($data)) {

            // Insert gallery data
            $insert = $this->db->insert_batch($this->imgTbl, $data);

            // Return the status
            return $insert ? $this->db->insert_id() : false;
        }
        return false;
    }

    public function update($data, $id)
    {
        if (!empty($data) && !empty($id)) {
            // Add modified date if not included
            if (!array_key_exists("modified", $data)) {
                $data['modified'] = date("Y-m-d H:i:s");
            }

            // Update gallery data
            $update = $this->db->update($this->galleryTbl, $data, array('id' => $id));

            // Return the status
            return $update ? true : false;
        }
        return false;
    }

    public function delete($id)
    {
        // Delete gallery data
        $delete = $this->db->delete($this->galleryTbl, array('id' => $id));

        // Return the status
        return $delete ? true : false;
    }

    public function deleteImage($con)
    {
        // Delete image data
        $delete = $this->db->delete($this->imgTbl, $con);

        // Return the status
        return $delete ? true : false;
    }

    public function getregion()
    {
    }
}
