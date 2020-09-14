<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Welcome extends CI_Controller
{
	public function index()
	{
		$d['kategori'] = $this->tampil_data();
		$this->load->view('layout', $d);
	}
	public function modal_add()
	{
		$this->load->view('modal_add');
	}
	public function kategori_simpan()
	{
		$this->form_validation->set_rules('nama', 'nama', 'required');
		if ($this->form_validation->run() == TRUE) {
			$post = $this->input->post(null, TRUE);
			$this->simpan_kategori($post);
			$id_terakhir = $this->db->insert_id();
			$data = $this->show_data($id_terakhir);
			$json = [
				'data' => $data,
				'status'  => true
			];
		} else {
			$json = array(
				'error' => true,
				'nama' => form_error('nama')
			);
		}
		echo json_encode($json);
	}
	public function simpan_kategori($post)
	{
		$data = array(
			'nama_kategori' => $post['nama']
		);
		return $this->db->insert('kategori', $data);
	}
	public function show_data($id = null)
	{
		return $this->db->where('id_kategori', $id)->get('kategori')->row_array();
	}
	public function tampil_data()
	{
		return $this->db->get('kategori')->result_array();
	}
}
