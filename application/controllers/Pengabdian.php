<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengabdian extends CI_Controller 
{
	public function __construct(){
		parent::__construct();

		$this->load->model('Panelmodel');
		
	}
	private function uploadFile(){

	    $config['upload_path']          = './upload/pengabdian/';
	    $config['allowed_types']        = 'pdf';
	    $config['file_name']            = $this->id_files;
	    $config['overwrite']			= true;
	    $config['max_size']             = 2024; // 1MB

	    $this->load->library('upload', $config);

	    if ($this->upload->do_upload('berkas')) {
	        return $this->upload->data("file_name");
	    }else{
	    	return "nofiles.pdf";
		}
	}

	public function add(){
		if ($this->session->userdata('login') != 'zpmlogin' && $this->session->userdata('role_id') != '2' && $this->session->userdata('role_id') != '1') {
    		redirect('Auth');
    	}else{
    	$this->id_files = uniqid();
		$data['judul'] = htmlspecialchars($this->input->post('judul', true));
		$data['jenis'] = htmlspecialchars($this->input->post('jenis', true));
		$data['tanggal_awal'] = htmlspecialchars($this->input->post('tg_mulai', true));
		$data['tanggal_Akhir'] = htmlspecialchars($this->input->post('tg_akhir', true));
		$data['tahun'] = htmlspecialchars($this->input->post('tahun', true));
		$data['lampiran'] = $this->uploadFile();;
		$this->Panelmodel->addpengab($data);
		$this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">Data berhasil ditambhkan.!
  		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
    	<span aria-hidden="true">&times;</span>
  		</button>
		</div>');
		redirect('Panel/pengab');
		}
		
	}
	public function hapus($id){
		if ($this->session->userdata('login') != 'zpmlogin' && $this->session->userdata('role_id') != '2' && $this->session->userdata('role_id') != '1') {
    		redirect('Auth');
    	}else{
			$this->Panelmodel->hapuspengab($id);
			$this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert">Data berhasil dihapus.!
  		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
    	<span aria-hidden="true">&times;</span>
  		</button>
		</div>');
			redirect('Panel/pengab');
		}
	}

	public function praedit(){
		if ($this->session->userdata('login') != 'zpmlogin' && $this->session->userdata('role_id') != '2' && $this->session->userdata('role_id') != '1') {
    		redirect('Auth');
    	}else{
    		$id = htmlspecialchars($this->input->post('pengab', true));
    		$pemb = $this->Panelmodel->pengabedit($id);
	    			echo '<div class="form-group">
	                  <label>Judul</label>
	                  <input type="hidden" name="id" value="'.$pemb->id.'">
	                  <input type="hidden" name="lampiran" value="'.$pemb->lampiran.'">
	                  <input type="text" class="form-control"  name="judul" value="'.$pemb->judul.'">
	                </div>
	                <div class="form-group">
	                  <label>Jenis</label>
	                  <input type="text" class="form-control"  name="jenis" value="'.$pemb->jenis.'">
	                </div>
	                <div class="form-group">
	                  <label>Tanggal Mulai</label>
	                  <input type="date" class="form-control"  name="tg_awal" value="'.$pemb->tanggal_mulai.'">
	                </div>
	                <div class="form-group">
	                  <label>Tanggal Berakhir</label>
	                  <input type="date" class="form-control"  name="tg_akhir" value="'.$pemb->tanggal_akhir.'">
	                </div>
	                <div class="form-group">
	                  <label>Tahun</label>
	                  <input type="text" class="form-control"  name="tahun" value="'.$pemb->tahun.'">
	                </div>
	                <div class="form-group">
	                  <label>File Aktif Saat Ini</label>
	                  <a href="'.base_url("upload/penelitian/").$pemb->lampiran.'">
                        <span class="badge badge-warning">View File '.$pemb->lampiran.'</span>
                      </a>
	                </div>
	                <div class="form-group">
	                    <label>Tipe file .pdf maksimal ukuran 2MB</label>
	                    <div class="custom-file">
	                      <input type="file" class="custom-file-input" id="customFile" name="berkas">
	                      <label class="custom-file-label" for="customFile">Lampiran</label>
	                    </div>
	                </div>';
				
        }
           
	}

	public function update(){
		if ($this->session->userdata('login') != 'zpmlogin' && $this->session->userdata('role_id') != '2' && $this->session->userdata('role_id') != '1') {
    		redirect('Auth');
    	}else{
    		$data['judul'] = htmlspecialchars($this->input->post('judul', true));
			$data['jenis'] = htmlspecialchars($this->input->post('jenis', true));
			$data['tanggal_mulai'] = htmlspecialchars($this->input->post('tg_awal', true));
			$data['tanggal_Akhir'] = htmlspecialchars($this->input->post('tg_akhir', true));
			$data['tahun'] = htmlspecialchars($this->input->post('tahun', true));
			if (!empty($_FILES["berkas"]["name"])) {
				$this->id_files = uniqid();
				$data['lampiran'] = $this->uploadFile();
			}else{
				$data['lampiran'] = htmlspecialchars($this->input->post('lampiran', true));
			}
			$where['id'] = htmlspecialchars($this->input->post('id', true));
    		$this->Panelmodel->pengabupdate($where,$data);
			$this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">Data berhasil diupdate
  		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
    	<span aria-hidden="true">&times;</span>
  		</button>
		</div>');
			
		redirect('Panel/pengab');
    	}
	}

}