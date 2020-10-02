<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Fakultas extends CI_Controller 
{
	public function __construct(){
		parent::__construct();

		$this->load->model('Panelmodel');
	}

	public function add(){
		if ($this->session->userdata('login') != 'zpmlogin' && $this->session->userdata('role_id') != '2') {
    		redirect('Auth');
    	}else{
		$data['kode_fakul'] = htmlspecialchars($this->input->post('kd_fak', true));
		$data['nama_fakul'] = htmlspecialchars($this->input->post('nm_fak', true));
		$data['alamat_fakul'] = htmlspecialchars($this->input->post('alamat', true));
		$data['telp_fakul'] = htmlspecialchars($this->input->post('telp', true));
		$data['email_fakul'] = htmlspecialchars($this->input->post('email', true));
		$this->Panelmodel->addfakultas($data);
		$this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">Data berhasil ditambhkan.!
  		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
    	<span aria-hidden="true">&times;</span>
  		</button>
		</div>');
		redirect('Panel/fakultas');
		}
		
	}
	public function hapus($id){
		if ($this->session->userdata('login') != 'zpmlogin' && $this->session->userdata('role_id') != '2') {
    		redirect('Auth');
    	}else{
			$this->Panelmodel->hapusfak($id);
			$this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert">Data berhasil dihapus.!
  		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
    	<span aria-hidden="true">&times;</span>
  		</button>
		</div>');
			redirect('Panel/fakultas');
		}
	}

	public function praedit(){
		if ($this->session->userdata('login') != 'zpmlogin' && $this->session->userdata('role_id') != '2') {
    		redirect('Auth');
    	}else{
    		$id = htmlspecialchars($this->input->post('fakul', true));
    		$prod = $this->Panelmodel->fakedit($id);
	    			echo '<div class="form-group">
	                  <label>Kode Fakultas</label>
	                  <input type="hidden" name="id_fak" value="'.$prod->id_fakultas.'">
	                  <input type="text" class="form-control"  name="kd_fak" value="'.$prod->kode_fakul.'">
	                </div>
	                <div class="form-group">
	                  <label>Nama Fakultas</label>
	                  <input type="text" class="form-control"  name="nm_fak" value="'.$prod->nama_fakul.'">
	                </div>
	                <div class="form-group">
	                  <label>Telp</label>
	                  <input type="text" class="form-control"  name="telp" value="'.$prod->telp_fakul.'">
	                </div>
	                 <div class="form-group">
	                  <label>Email</label>
	                  <input type="email" class="form-control"  name="email" value="'.$prod->email_fakul.'">
	                </div>
	                <div class="form-group">
	                  <label>Alamat</label>
	                  <textarea class="form-control" name="alamat" rows="5">'.$prod->alamat_fakul.'</textarea>
	                </div>';
				
        }
           
	}

	public function update(){
		if ($this->session->userdata('login') != 'zpmlogin' && $this->session->userdata('role_id') != '2') {
    		redirect('Auth');
    	}else{
    		$data['kode_fakul'] = htmlspecialchars($this->input->post('kd_fak', true));
			$data['nama_fakul'] = htmlspecialchars($this->input->post('nm_fak', true));
			$data['alamat_fakul'] = htmlspecialchars($this->input->post('alamat', true));
			$data['telp_fakul'] = htmlspecialchars($this->input->post('telp', true));
			$data['email_fakul'] = htmlspecialchars($this->input->post('email', true));
			$where['id_fakultas'] = htmlspecialchars($this->input->post('id_fak', true));
    		$this->Panelmodel->fakulupdate($where,$data);
			$this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">Data berhasil diupdate
  		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
    	<span aria-hidden="true">&times;</span>
  		</button>
		</div>');
			
		redirect('Panel/fakultas');
    	}
	}

}