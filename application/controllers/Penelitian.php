<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Penelitian extends CI_Controller 
{
	public function __construct(){
		parent::__construct();

		$this->load->model('Panelmodel');
		
	}
	private function uploadFile(){

	    $config['upload_path']          = './upload/penelitian/';
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
		if ($this->session->userdata('login') != 'zpmlogin' && $this->session->userdata('role_id') != '2' && $this->session->userdata('role_id') != '1' && $this->session->userdata('role_id') != '3') {
    		redirect('Auth');
    	}else{
    	$this->id_files = uniqid();
    	$this->uploadFile();
		$data['skim'] = htmlspecialchars($this->input->post('skim', true));
		$data['anggran'] = htmlspecialchars($this->input->post('anggran', true));
		$data['afliansi'] = htmlspecialchars($this->input->post('afliansi', true));
		$data['kelompok'] = htmlspecialchars($this->input->post('kelompok', true));
		$data['sk'] = htmlspecialchars($this->input->post('sk', true));
		$data['lama'] = htmlspecialchars($this->input->post('lama', true));
		$data['lokasi'] = htmlspecialchars($this->input->post('lokasi', true));
		$data['judul'] = htmlspecialchars($this->input->post('judul', true));
		$data['sumber_Dana'] = htmlspecialchars($this->input->post('sb_dana', true));
		$data['tahun_penelitian'] = htmlspecialchars($this->input->post('tahun', true));
		$data['jumla_dana'] = htmlspecialchars($this->input->post('dana', true));
		$data['lampiran'] = $this->uploadFile();
		$this->Panelmodel->addpenelitian($data);
		$this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">Data berhasil ditambhkan.!
  		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
    	<span aria-hidden="true">&times;</span>
  		</button>
		</div>');
		redirect('Panel/penelitian');
		}
		
	}
	public function hapus($id){
		if ($this->session->userdata('login') != 'zpmlogin' && $this->session->userdata('role_id') != '2'  && $this->session->userdata('role_id') != '1' && $this->session->userdata('role_id') != '3') {
    		redirect('Auth');
    	}else{
			$this->Panelmodel->hapuspenelitian($id);
			$this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert">Data berhasil dihapus.!
  		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
    	<span aria-hidden="true">&times;</span>
  		</button>
		</div>');
			redirect('Panel/penelitian');
		}
	}

	public function praedit(){
		if ($this->session->userdata('login') != 'zpmlogin' && $this->session->userdata('role_id') != '2'  && $this->session->userdata('role_id') != '1' && $this->session->userdata('role_id') != '3') {
    		redirect('Auth');
    	}else{
    		$id = htmlspecialchars($this->input->post('riset', true));
    		$riset = $this->Panelmodel->risetedit($id);
	    			echo '<div class="form-group">
	                  <label>Judul</label>
	                  <input type="hidden" name="id_penelitian" value="'.$riset->id_penelitian.'">
	                  <input type="hidden" name="lampiran" value="'.$riset->lampiran.'">
	                  <input type="text" class="form-control"  name="judul" value="'.$riset->judul_penelitian.'">
	                </div>
	                <div class="form-group">
	                  <label>Skim Kegiatan</label>
	                  <input type="text" class="form-control"  name="skim" value="'.$riset->skim.'">
	                </div>
	                <div class="form-group">
	                  <label>Tahun Anggaran</label>
	                  <input type="text" class="form-control"  name="anggran" value="'.$riset->anggran.'">
	                </div>
	                <div class="form-group">
	                  <label>Afliansi Kelompok</label>
	                  <input type="text" class="form-control"  name="afliansi" value="'.$riset->afliansi.'">
	                </div>
	                <div class="form-group">
	                  <label>Kelompok Bidang</label>
	                  <input type="text" class="form-control"  name="kelompok" value="'.$riset->kelompok_bidang.'">
	                </div>
	                <div class="form-group">
	                  <label>No Sk Penugasan</label>
	                  <input type="text" class="form-control"  name="sk" value="'.$riset->no_sk.'">
	                </div>
	                <div class="form-group">
	                  <label>Lama Kegiatan</label>
	                  <input type="text" class="form-control"  name="lama" value="'.$riset->lama_kegiatan.'">
	                </div>
	                <div class="form-group">
	                  <label>Lokasi Kegiatan</label>
	                  <input type="text" class="form-control"  name="lokasi" value="'.$riset->lokasi.'">
	                </div>
	                <div class="form-group">
	                  <label>Tahun Penelitian</label>
	                  <input type="text" class="form-control"  name="tahun" value="'.$riset->tahun_penelitian.'">
	                </div>
	                <div class="form-group">
	                  <label>Jumlah Dana</label>
	                  <input type="number" class="form-control"  name="dana" value="'.$riset->jumla_dana.'">
	                </div>
	                <div class="form-group">
	                  <label>Sumber Dana</label>
	                  <input type="text" class="form-control"  name="sb_dana" value="'.$riset->sumber_dana.'">
	                </div>
	                <div class="form-group">
	                  <label>File Aktif Saat Ini</label>
	                  <a href="'.base_url("upload/penelitian/").$riset->lampiran.'">
                        <span class="badge badge-warning">View File '.$riset->lampiran.'</span>
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
		if ($this->session->userdata('login') != 'zpmlogin' && $this->session->userdata('role_id') != '2'  && $this->session->userdata('role_id') != '1' && $this->session->userdata('role_id') != '3') {
    		redirect('Auth');
    	}else{
    		$data['skim'] = htmlspecialchars($this->input->post('skim', true));
			$data['anggran'] = htmlspecialchars($this->input->post('anggran', true));
			$data['afliansi'] = htmlspecialchars($this->input->post('afliansi', true));
			$data['kelompok_bidang'] = htmlspecialchars($this->input->post('kelompok', true));
			$data['no_sk'] = htmlspecialchars($this->input->post('sk', true));
			$data['lama_kegiatan'] = htmlspecialchars($this->input->post('lama', true));
			$data['lokasi'] = htmlspecialchars($this->input->post('lokasi', true));
    		$data['judul_penelitian'] = htmlspecialchars($this->input->post('judul', true));
			$data['sumber_dana'] = htmlspecialchars($this->input->post('sb_dana', true));
			$data['tahun_penelitian'] = htmlspecialchars($this->input->post('tahun', true));
			$data['jumla_dana'] = htmlspecialchars($this->input->post('dana', true));
			if (!empty($_FILES["berkas"]["name"])) {
				$this->id_files = uniqid();
				$data['lampiran'] = $this->uploadFile();
			}else{
				$data['lampiran'] = htmlspecialchars($this->input->post('lampiran', true));
			}
			$where['id_penelitian'] = htmlspecialchars($this->input->post('id_penelitian', true));
    		$this->Panelmodel->penelitianupdate($where,$data);
			$this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">Data berhasil diupdate
  		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
    	<span aria-hidden="true">&times;</span>
  		</button>
		</div>');
			
		redirect('Panel/penelitian');
    	}
	}

}