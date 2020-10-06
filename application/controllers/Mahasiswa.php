<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mahasiswa extends CI_Controller 
{
	public function __construct(){
		parent::__construct();

		$this->load->model('Panelmodel');
	}

	public function add(){
		if ($this->session->userdata('login') != 'zpmlogin' && $this->session->userdata('role_id') != '2' $this->session->userdata('role_id') == '3') {
    		redirect('Auth');
    	}else{
    	$data['id_fakultas'] = htmlspecialchars($this->input->post('fakul', true));
		$data['id_prodi'] = htmlspecialchars($this->input->post('prodi', true));
		$data['nama_mahasiswa'] = htmlspecialchars($this->input->post('nama', true));
		$data['tempat_lahir'] = htmlspecialchars($this->input->post('tmp', true));
		$data['tanggal_lahir'] = htmlspecialchars($this->input->post('ttl', true));
		$data['alamat'] = htmlspecialchars($this->input->post('alamat', true));
		$data['telp'] = htmlspecialchars($this->input->post('tlp', true));
		$data['email'] = htmlspecialchars($this->input->post('email', true));
		$this->Panelmodel->addmahas($data);
		$this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">Data berhasil ditambhkan.!
  		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
    	<span aria-hidden="true">&times;</span>
  		</button>
		</div>');
		redirect('Panel/mahasiswa');
		}
		
	}
	public function hapus($id){
		if ($this->session->userdata('login') != 'zpmlogin' && $this->session->userdata('role_id') != '2' $this->session->userdata('role_id') == '3') {
    		redirect('Auth');
    	}else{
			$this->Panelmodel->hapusmahas($id);
			$this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert">Data berhasil dihapus.!
  		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
    	<span aria-hidden="true">&times;</span>
  		</button>
		</div>');
			redirect('Panel/mahasiswa');
		}
	}

	public function praedit(){
		if ($this->session->userdata('login') != 'zpmlogin' && $this->session->userdata('role_id') != '2' $this->session->userdata('role_id') == '3') {
    		redirect('Auth');
    	}else{
    		$id = htmlspecialchars($this->input->post('mahas', true));
    		$fakul = $this->Panelmodel->getfakultas()->result();
            $prodi = $this->Panelmodel->getprodi()->result();
    		$mahas = $this->Panelmodel->mahasedit($id);
	    		echo '<div class="form-group">
		                  <label>Fakultas</label>
		                  <select class="form-control" name="fakul">'.'<option value="'.$mahas->id_fakultas.'">'.$mahas->nama_fakul.' (Data Aktif)</option>';
				foreach ($fakul as $f) {
					echo'
	                    <option value="'.$f->id_fakultas.'">'.$f->nama_fakul.'</option>'
	                  ;
				}
				echo '</select>
	                </div>';
	            echo '<div class="form-group">
		                  <label>Prodi</label>
		                  <select class="form-control" name="prodi">'.'<option value="'.$mahas->id_prodi.'">'.$mahas->nama_prodi.' (Data Aktif)</option>';
				foreach ($prodi as $p) {
					echo'
	                    <option value="'.$p->id_prodi.'">'.$p->nama_prodi.'</option>'
	                  ;
				}
				echo '</select>
	                </div>';
	            echo '<div class="form-group">
                  <label>Nama</label>
                  <input type="text" class="form-control"  name="nama" value="'.$mahas->nama_mahasiswa.'">
                </div>
                <div class="form-group">
                  <label>Tempat Lahir</label>
                  <input type="hidden" name="id" value="'.$mahas->id_mahasiswa.'">
                  <input type="text" class="form-control"  name="tmp" value="'.$mahas->tempat_lahir.'">
                </div>
                <div class="form-group">
                  <label>Tanggal Lahir</label>
                  <input type="date" class="form-control"  name="ttl" value="'.$mahas->tanggal_lahir.'">
                </div>
                <div class="form-group">
                  <label>Telp</label>
                  <input type="text" class="form-control"  name="tlp" value="'.$mahas->telp.'">
                </div>
                <div class="form-group">
                  <label>Email</label>
                  <input type="text" class="form-control"  name="email" value="'.$mahas->email.'">
                </div>
                <div class="form-group">
                  <label>Alamat</label>
                  <textarea class="form-control" name="alamat" rows="5">'.$mahas->alamat.'</textarea>
                </div>';

        }
           
	}

	public function update(){
		if ($this->session->userdata('login') != 'zpmlogin' && $this->session->userdata('role_id') != '2' $this->session->userdata('role_id') == '3') {
    		redirect('Auth');
    	}else{
    		$data['id_fakultas'] = htmlspecialchars($this->input->post('fakul', true));
			$data['id_prodi'] = htmlspecialchars($this->input->post('prodi', true));
			$data['nama_mahasiswa'] = htmlspecialchars($this->input->post('nama', true));
			$data['tempat_lahir'] = htmlspecialchars($this->input->post('tmp', true));
			$data['tanggal_lahir'] = htmlspecialchars($this->input->post('ttl', true));
			$data['alamat'] = htmlspecialchars($this->input->post('alamat', true));
			$data['telp'] = htmlspecialchars($this->input->post('tlp', true));
			$data['email'] = htmlspecialchars($this->input->post('email', true));
			$where['id_mahasiswa'] = htmlspecialchars($this->input->post('id', true));
    		$this->Panelmodel->mahasupdate($where,$data);
			$this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">Data berhasil diupdate
  		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
    	<span aria-hidden="true">&times;</span>
  		</button>
		</div>');
			
		redirect('Panel/mahasiswa');
    	}
	}

}