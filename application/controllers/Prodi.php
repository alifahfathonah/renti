<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Prodi extends CI_Controller 
{
	public function __construct(){
		parent::__construct();

		$this->load->model('Panelmodel');
	}

	public function add(){
		if ($this->session->userdata('login') != 'zpmlogin' && $this->session->userdata('role_id') != '2') {
    		redirect('Auth');
    	}else{
		$data['kode_prodi'] = htmlspecialchars($this->input->post('kd_prod', true));
		$data['nama_prodi'] = htmlspecialchars($this->input->post('nm_prod', true));
		$this->Panelmodel->addprodi($data);
		$this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">Data berhasil ditambhkan.!
  		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
    	<span aria-hidden="true">&times;</span>
  		</button>
		</div>');
		redirect('Panel/prodi');
		}
		
	}
	public function hapus($id){
		if ($this->session->userdata('login') != 'zpmlogin' && $this->session->userdata('role_id') != '2') {
    		redirect('Auth');
    	}else{
			$this->Panelmodel->hapus($id);
			$this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert">Data berhasil dihapus.!
  		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
    	<span aria-hidden="true">&times;</span>
  		</button>
		</div>');
			redirect('Panel/prodi');
		}
	}

	public function praedit(){
		if ($this->session->userdata('login') != 'zpmlogin' && $this->session->userdata('role_id') != '2') {
    		redirect('Auth');
    	}else{
    		$id = htmlspecialchars($this->input->post('prodi', true));
    		$prod = $this->Panelmodel->Prodiedit($id);
				echo '<div class="form-group">
                  <label>Kode Prodi</label>
                  <input type="hidden" name="id_prod" value="'.$prod->id_prodi.'">
                  <input type="text" class="form-control"  name="kd_prod" value="'.$prod->kode_prodi.'">
                </div>
                <div class="form-group">
                  <label>Nama Prodi</label>
                  <input type="text" class="form-control"  name="nm_prod" value="'.$prod->nama_prodi.'">
                </div>';
        }
           
	}

	public function update(){
		if ($this->session->userdata('login') != 'zpmlogin' && $this->session->userdata('role_id') != '2') {
    		redirect('Auth');
    	}else{
    		$data['kode_prodi'] = htmlspecialchars($this->input->post('kd_prod', true));
			$data['nama_prodi'] = htmlspecialchars($this->input->post('nm_prod', true));
			$where['id_prodi'] = htmlspecialchars($this->input->post('id_prod', true));
    		$this->Panelmodel->Prodiupdate($where,$data);
			$this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">Data berhasil diupdate
  		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
    	<span aria-hidden="true">&times;</span>
  		</button>
		</div>');
			
		redirect('Panel/prodi');
    	}
	}

}