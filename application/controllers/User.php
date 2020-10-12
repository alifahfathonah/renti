<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller 
{
	public function __construct(){
		parent::__construct();

		$this->load->model('Panelmodel');
	}


	public function add(){
		if ($this->session->userdata('login') != 'zpmlogin' && $this->session->userdata('role_id') != '2') {
    		redirect('Auth');
    	}else{
    	$nama = htmlspecialchars($this->input->post('nama', true));
    	$email = htmlspecialchars($this->input->post('email', true));
    	$role = htmlspecialchars($this->input->post('role', true));
    	$pass = password_hash($this->input->post('pass'), PASSWORD_DEFAULT);
		
		$dat['name'] = $nama;
		$dat['email'] = $email;
		$dat['role_id'] = $role;
		$dat['pass'] = $pass;
		$dat['date'] = time();
		$this->Panelmodel->adduser($dat);
		$this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">Data berhasil ditambhkan.!
  		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
    	<span aria-hidden="true">&times;</span>
  		</button>
		</div>');
		redirect('Panel/user');
		}
		
	}
	public function hapus($id){
		if ($this->session->userdata('login') != 'zpmlogin' && $this->session->userdata('role_id') != '2') {
    		redirect('Auth');
    	}else{
			$this->Panelmodel->hapususer($id);
			$this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert">Data berhasil dihapus.!
  		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
    	<span aria-hidden="true">&times;</span>
  		</button>
		</div>');
			redirect('Panel/user');
		}
	}

	public function praedit(){
		if ($this->session->userdata('login') != 'zpmlogin' && $this->session->userdata('role_id') != '2') {
    		redirect('Auth');
    	}else{
    		$id = htmlspecialchars($this->input->post('use', true));
    		$role = $this->Panelmodel->roleuser()->result();
    		$user = $this->Panelmodel->useredit($id);
    		$jb = $this->Panelmodel->userjbt($user->role_id);
	            echo '<div class="form-group">
                  <label>Nama</label>
                  <input type="hidden" name="id" value="'.$user->id.'">
                  <input type="text" class="form-control"  name="nama" value="'.$user->name.'">
                </div>
                <div class="form-group">
                  <label>Email</label>
                  <input type="email" class="form-control"  name="email" value="'.$user->email.'">
                </div>';
                echo '<div class="form-group">
		                  <label>Jenis User</label>
		                  <select class="form-control" name="user">'.'<option value="'.$jb->id.'">'.$jb->role.' (Data Aktif)</option>';
				foreach ($role as $r) {
					echo'
	                    <option value="'.$r->id.'">'.$r->role.'</option>'
	                  ;
				}
				echo '</select>
	                </div>';
                echo '<div class="form-group">
                  <label>Password</label>
                  <input type="password" class="form-control"  name="pass">
                </div>';
                
        }
           
	}

	public function update(){
		if ($this->session->userdata('login') != 'zpmlogin' && $this->session->userdata('role_id') != '2') {
    		redirect('Auth');
    	}else{
    		$id = htmlspecialchars($this->input->post('id', true));
    		$nama = htmlspecialchars($this->input->post('nama', true));
    		$email = htmlspecialchars($this->input->post('email', true));
	    	$user = htmlspecialchars($this->input->post('user', true));
	    	if (empty($this->input->post('pass'))) {
	    		$ts = array(
					'name' => $nama,
					'email' => $email,
					'role_id' => $user
				);
	    	}else{
	    		$pass = password_hash($this->input->post('pass'), PASSWORD_DEFAULT);
	    		$ts = array(
					'name' => $nama,
					'email' => $email,
					'role_id' => $user,
					'password' => $pass
				);
	    	}
			$por['id'] = $id;
    		$this->Panelmodel->userupdate($por,$ts);
				$this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">Data berhasil diupdate
	  		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
	    	<span aria-hidden="true">&times;</span>
	  		</button>
			</div>');
			
		redirect('Panel/user');
    	}
	}

}