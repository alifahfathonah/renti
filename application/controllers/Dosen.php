<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dosen extends CI_Controller 
{
	public function __construct(){
		parent::__construct();

		$this->load->model('Panelmodel');
		$this->load->model('Addakun');
	}


	public function add(){
		if ($this->session->userdata('login') != 'zpmlogin' && $this->session->userdata('role_id') != '2') {
    		redirect('Auth');
    	}else{
    	$nama = htmlspecialchars($this->input->post('nama', true));
    	$email = htmlspecialchars($this->input->post('email', true));
    	$fakultas = htmlspecialchars($this->input->post('fakul', true));
    	$prodi = htmlspecialchars($this->input->post('prodi', true));
    	$alamat = htmlspecialchars($this->input->post('alamat', true));
    	$telp = htmlspecialchars($this->input->post('tlp', true));
    	$pass = password_hash($this->input->post('pass'), PASSWORD_DEFAULT);
		$jam = time();
		$ts = array(
			'nama_dosen' => $nama,
			'email' => $email,
			'date_created' => $jam, 
			'pass' => $pass
		);
		$this->Addakun->add($ts);
		$userid = $this->db->insert_id();
		$por = array(
			'id_fakultas' => $fakultas,
			'id_prodi' => $prodi,
			'nama_dosen' => $nama,
			'alamat' => $alamat,
			'telp' => $telp,
			'id_user' => $userid
		 );
		$this->Panelmodel->adddosen($por);
		$this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">Data berhasil ditambhkan.!
  		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
    	<span aria-hidden="true">&times;</span>
  		</button>
		</div>');
		redirect('Panel/dosen');
		}
		
	}
	public function hapus($id,$user){
		if ($this->session->userdata('login') != 'zpmlogin' && $this->session->userdata('role_id') != '2') {
    		redirect('Auth');
    	}else{

			$this->Panelmodel->hapusdosen($id);
			$this->Addakun->hapusakun($user);
			$this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert">Data berhasil dihapus.!
  		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
    	<span aria-hidden="true">&times;</span>
  		</button>
		</div>');
			redirect('Panel/dosen');
		}
	}

	public function praedit(){
		if ($this->session->userdata('login') != 'zpmlogin' && $this->session->userdata('role_id') != '2') {
    		redirect('Auth');
    	}else{
    		$id = htmlspecialchars($this->input->post('dosen', true));
    		$fakul = $this->Panelmodel->getfakultas()->result();
            $prodi = $this->Panelmodel->getprodi()->result();
    		$dosen = $this->Panelmodel->dosenedit($id);
	    		echo '<div class="form-group">
		                  <label>Fakultas</label>
		                  <select class="form-control" name="fakul">'.'<option value="'.$dosen->id_fakultas.'">'.$dosen->nama_fakul.' (Data Aktif)</option>';
				foreach ($fakul as $f) {
					echo'
	                    <option value="'.$f->id_fakultas.'">'.$f->nama_fakul.'</option>'
	                  ;
				}
				echo '</select>
	                </div>';
	            echo '<div class="form-group">
		                  <label>Prodi</label>
		                  <select class="form-control" name="prodi">'.'<option value="'.$dosen->id_prodi.'">'.$dosen->nama_prodi.' (Data Aktif)</option>';
				foreach ($prodi as $p) {
					echo'
	                    <option value="'.$p->id_prodi.'">'.$p->nama_prodi.'</option>'
	                  ;
				}
				echo '</select>
	                </div>';
	            echo '<div class="form-group">
                  <label>Nama</label>
                  <input type="text" class="form-control"  name="nama" value="'.$dosen->nama_dosen.'">
                </div>
                <div class="form-group">
                  <label>Tempat Lahir</label>
                  <input type="hidden" name="id_dosen" value="'.$dosen->id_dosen.'">
                  <input type="hidden" name="id_user" value="'.$dosen->id_user.'">
                </div>
                <div class="form-group">
                  <label>Telp</label>
                  <input type="text" class="form-control"  name="tlp" value="'.$dosen->telp.'">
                </div>
                <div class="form-group">
                  <label>Email</label>
                  <input type="text" class="form-control"  name="email" value="'.$dosen->email.'">
                </div>
                <div class="form-group">
                  <label>Alamat</label>
                  <textarea class="form-control" name="alamat" rows="5">'.$dosen->alamat.'</textarea>
                </div>
                <div class="form-group">
                  <label>Password</label>
                  <input type="password" class="form-control"  name="pass">
                </div>';
                

        }
           
	}

	public function update(){
		if ($this->session->userdata('login') != 'zpmlogin' && $this->session->userdata('role_id') != '2') {
    		redirect('Auth');
    	}else{
    		$iddosen = htmlspecialchars($this->input->post('id_dosen', true));
    		$iduser = htmlspecialchars($this->input->post('id_user', true));
    		$nama = htmlspecialchars($this->input->post('nama', true));
	    	$email = htmlspecialchars($this->input->post('email', true));
	    	$fakultas = htmlspecialchars($this->input->post('fakul', true));
	    	$prodi = htmlspecialchars($this->input->post('prodi', true));
	    	$alamat = htmlspecialchars($this->input->post('alamat', true));
	    	$telp = htmlspecialchars($this->input->post('tlp', true));
	    	$pass = password_hash($this->input->post('pass'), PASSWORD_DEFAULT);
	    	if (empty($this->input->post('pass'))) {
	    		$ts = array(
					'name' => $nama,
					'email' => $email,
				);
	    	}else{
	    		$ts = array(
					'name' => $nama,
					'email' => $email,
					'password' => $pass
				);
	    	}
			$por = array(
				'id_fakultas' => $fakultas,
				'id_prodi' => $prodi,
				'nama_dosen' => $nama,
				'alamat' => $alamat,
				'telp' => $telp,
			 );

			$cf['id_dosen'] = $iddosen;
			$cd['id'] = $iduser;
    		$this->Panelmodel->dosenupdate($cf,$por);
    		$this->Addakun->akunupdate($cd,$ts);
				$this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">Data berhasil diupdate
	  		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
	    	<span aria-hidden="true">&times;</span>
	  		</button>
			</div>');
			
		redirect('Panel/dosen');
    	}
	}

}