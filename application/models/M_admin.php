<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_admin extends CI_Model
{
	public function update($data, $id)
	{
		$this->db->where("id", $id);
		$data['diubah'] = date("Y-m-d H:i:s");
		$this->db->update("admin", $data);

		return $this->db->affected_rows();
	}
	// Update Profil
	public function select($id = '')
	{
		if ($id != '') {
			$this->db->where('id', $id);
		}

		$data = $this->db->get('admin');

		return $data->row();
	}

	function hapus($params = '')
	{
		$sql = "DELETE  FROM admin WHERE id = ? ";
		return $this->db->query($sql, $params);
	}

	public function get_data_admin()
	{
		$this->db->select('admin.*, toko.id AS id_toko, nama_toko');
		$this->db->join('toko', 'admin.id_toko = toko.id');
		$query = $this->db->get('admin');
		return $query->result();
	}
	public function get_toko()
	{
		$query = $this->db->query("SELECT * FROM toko ");
		return $query->result();
	}

	// Dashboard Super admin
	// dasboard hitung jumlah
	// jumlah toko
	public function jum_toko()
	{
		$this->db->select('toko.*');
		$query = $this->db->get('toko');
		return $query->num_rows();
	}
	// jumlah admin
	public function jum_adm()
	{
		$this->db->select('admin.*');
		$query = $this->db->get('admin');
		return $query->num_rows();
	}
	// jumlah kadar
	public function jum_kdr()
	{
		$this->db->select('id, title, COUNT(title) as jum_kdr');
		$this->db->group_by('title');
		$this->db->order_by('jum_kdr', 'desc');
		$hasil = $this->db->get('gallery');
		return $hasil->num_rows();
	}
	//jumlah gambar
	public function jum_gbr($file_name = '')
	{
		$this->db->select('id, file_name, COUNT(file_name) as jum_gbr');
		$this->db->group_by('file_name');
		$this->db->order_by('jum_gbr', 'desc');
		$hasil = $this->db->get('gallery_images');
		return $hasil->num_rows();
	}
	function hapus_toko($params = '')
	{
		$sql = "DELETE  FROM toko WHERE id = ? ";
		return $this->db->query($sql, $params);
	}
	// akhir dashboard superadmin

	public function get_region()
	{
		$this->db->select('admin.*, toko.id AS id_toko, nama_toko');
		$this->db->join('toko', 'admin.id_toko = toko.id');
		// $this->db->order_by('nama_toko');
		$query = $this->db->get('admin');
		return $query->result();
	}
}

/* End of file M_admin.php */
/* Location: ./application/models/M_admin.php */