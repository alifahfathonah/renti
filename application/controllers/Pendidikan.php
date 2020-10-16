<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pendidikan extends CI_Controller 
{
	public function __construct(){
		parent::__construct();

		$this->load->model('Panelmodel');
	}

	public function add(){
		if ($this->session->userdata('login') != 'zpmlogin' && $this->session->userdata('role_id') != '2' && $this->session->userdata('role_id') == '3') {
    		redirect('Auth');
    	}else{
    	$data['jenjang'] = htmlspecialchars($this->input->post('jenjang', true));
		$data['gelar'] = htmlspecialchars($this->input->post('gelar', true));
		$data['studi'] = htmlspecialchars($this->input->post('studi', true));
		$data['stut'] = htmlspecialchars($this->input->post('stut', true));
		$data['masuk'] = htmlspecialchars($this->input->post('masuk', true));
		$data['lulus'] = htmlspecialchars($this->input->post('lulus', true));
		$this->Panelmodel->addpendik($data);
		$this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">Data berhasil ditambhkan.!
  		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
    	<span aria-hidden="true">&times;</span>
  		</button>
		</div>');
		redirect('Panel/pendidikan');
		}
		
	}
	public function hapus($id){
		if ($this->session->userdata('login') != 'zpmlogin' && $this->session->userdata('role_id') != '2' && $this->session->userdata('role_id') == '3') {
    		redirect('Auth');
    	}else{
			$this->Panelmodel->hapuspendik($id);
			$this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert">Data berhasil dihapus.!
  		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
    	<span aria-hidden="true">&times;</span>
  		</button>
		</div>');
			redirect('Panel/pendidikan');
		}
	}

	public function praedit(){
		if ($this->session->userdata('login') != 'zpmlogin' && $this->session->userdata('role_id') != '2' && $this->session->userdata('role_id') == '3') {
    		redirect('Auth');
    	}else{
    		$id = htmlspecialchars($this->input->post('pendik', true));
    		$pen = $this->Panelmodel->pendikedit($id);
	    		echo '
	    			<div class="form-group">
	                  <label>Jenjang</label>
	                  <input type="hidden" name="id" value="'.$pen->id_pendidikan.'">
	                  <input type="text" class="form-control"  name="jenjang" value="'.$pen->jenjang.'">
	                </div>
	                <div class="form-group">
	                  <label>Gelar</label>
	                  <input type="text" class="form-control"  name="gelar" value="'.$pen->gelar.'">
	                </div>
	                <div class="form-group">
	                  <label>Bidang Studi</label>
	                  <input type="text" class="form-control"  name="studi" value="'.$pen->bidang_studi.'">
	                </div>
	                 <div class="form-group">
	                  <label>Institusi</label>
	                  <input type="text" class="form-control"  name="stut" value="'.$pen->institusi.'">
	                </div>
	                 <div class="form-group">
	                  <label>Tahun Masuk</label>
	                  <input type="text" class="form-control"  name="masuk" value="'.$pen->tahun_masuk.'">
	                </div>
	                 <div class="form-group">
	                  <label>Tahun Lulus</label>
	                  <input type="text" class="form-control"  name="lulus" value="'.$pen->tahun_lulus.'">
	                </div>
	    		';

        }
           
	}

	public function update(){
		if ($this->session->userdata('login') != 'zpmlogin' && $this->session->userdata('role_id') != '2' && $this->session->userdata('role_id') == '3') {
    		redirect('Auth');
    	}else{
    		$data['jenjang'] = htmlspecialchars($this->input->post('jenjang', true));
			$data['gelar'] = htmlspecialchars($this->input->post('gelar', true));
			$data['bidang_studi'] = htmlspecialchars($this->input->post('studi', true));
			$data['institusi'] = htmlspecialchars($this->input->post('stut', true));
			$data['tahun_masuk'] = htmlspecialchars($this->input->post('masuk', true));
			$data['tahun_lulus'] = htmlspecialchars($this->input->post('lulus', true));
			$where['id_pendidikan'] = htmlspecialchars($this->input->post('id', true));
    		$this->Panelmodel->pendikupdate($where,$data);
			$this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">Data berhasil diupdate
  		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
    	<span aria-hidden="true">&times;</span>
  		</button>
		</div>');
			
		redirect('Panel/pendidikan');
    	}
	}

}