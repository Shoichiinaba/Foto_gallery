<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Katalog_m extends CI_Model
{

    function __construct()
    {
        $this->galleryTbl   = 'gallery';
        $this->imgTbl = 'gallery_images';
    }

    /*
     * Fetch gallery data from the database
     * @param id returns a single record if specified, otherwise all records
     */
    public function getRows($id = '')
    {
        $this->db->select("*, (SELECT file_name FROM " . $this->imgTbl . " WHERE gallery_id = " . $this->galleryTbl . ".id ORDER BY id DESC LIMIT 1) as default_image");
        $this->db->from($this->galleryTbl);
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

    /*
     * Fetch image data from the database
     * @param id returns a single record
     */
    public function getImgRow($id)
    {
        $this->db->select('*');
        $this->db->from($this->imgTbl);
        $this->db->where('id', $id);
        $query  = $this->db->get();
        return ($query->num_rows() > 0) ? $query->row_array() : false;
    }

    function get_toko()
    {
        return $this->db->get('toko')->result();
    }
    // pencarian live
    function fetch_data($query, $title = '75')
    {

        $this->db->select("*, (SELECT file_name FROM " . $this->imgTbl . " WHERE gallery_id = " . $this->galleryTbl . ".id ORDER BY id DESC LIMIT 1) as default_image");
        $this->db->from($this->galleryTbl);
        $this->db->where('title', $title);
        if ($this->session->userdata('kode_toko')) {
            $this->db->where('id_toko', $this->session->userdata('kode_toko'));
        }
        if ($query != '') {
            $this->db->like('created', $query);
        }
        $this->db->order_by('created', 'DESC');
        return $this->db->get();
    }

    function fetch_data2($query, $title = '300')
    {
        $this->db->select("*, (SELECT file_name FROM " . $this->imgTbl . " WHERE gallery_id = " . $this->galleryTbl . ".id ORDER BY id DESC LIMIT 1) as default_image");
        $this->db->from($this->galleryTbl);
        $this->db->where('title', $title);
        if ($this->session->userdata('kode_toko')) {
            $this->db->where('id_toko', $this->session->userdata('kode_toko'));
        }
        if ($query != '') {
            $this->db->like('created', $query);
        }
        $this->db->order_by('created', 'DESC');
        return $this->db->get();
    }

    function fetch_data3($query, $title = '420')
    {
        $this->db->select("*, (SELECT file_name FROM " . $this->imgTbl . " WHERE gallery_id = " . $this->galleryTbl . ".id ORDER BY id DESC LIMIT 1) as default_image");
        $this->db->from($this->galleryTbl);
        $this->db->where('title', $title);
        if ($this->session->userdata('kode_toko')) {
            $this->db->where('id_toko', $this->session->userdata('kode_toko'));
        }
        if ($query != '') {
            $this->db->like('created', $query);
        }
        $this->db->order_by('created', 'DESC');
        return $this->db->get();
    }
    function fetch_data4($query, $title = '700')
    {
        $this->db->select("*, (SELECT file_name FROM " . $this->imgTbl . " WHERE gallery_id = " . $this->galleryTbl . ".id ORDER BY id DESC LIMIT 1) as default_image");
        $this->db->from($this->galleryTbl);
        $this->db->where('title', $title);
        if ($this->session->userdata('kode_toko')) {
            $this->db->where('id_toko', $this->session->userdata('kode_toko'));
        }
        if ($query != '') {
            $this->db->like('created', $query);
        }
        $this->db->order_by('created', 'DESC');
        return $this->db->get();
    }
}
