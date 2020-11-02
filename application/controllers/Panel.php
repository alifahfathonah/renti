<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Panel extends CI_Controller 
{
	public function __construct(){
		parent::__construct();

		$this->load->model('Panelmodel');
        
	}

    public function index()
    {

    	if ($this->session->userdata('login') != 'zpmlogin') {
    		redirect('Auth');
    	}else{
    		$this->load->view('templates/panel_header');
		    $this->load->view('templates/panel_menu');
		    $this->load->view('pub/home');
		    $this->load->view('templates/panel_footer');
    	}
    	
    }

    public function prodi(){
    	if ($this->session->userdata('login') != 'zpmlogin' && $this->session->userdata('role_id') != '2') {
    		redirect('Auth');
    	}else{

    		$data['prodi'] = $this->Panelmodel->getprodi()->result();
    		$this->load->view('templates/panel_header');
		    $this->load->view('templates/panel_menu');
		    $this->load->view('prodi/index',$data);
		    $this->load->view('templates/panel_footer');
    	}
    }

    public function dosen(){
        if ($this->session->userdata('login') != 'zpmlogin' && $this->session->userdata('role_id') != '2') {
            redirect('Auth');
        }else{
            $data['dosen'] = $this->Panelmodel->getdosen()->result();
            $data['fakul'] = $this->Panelmodel->getfakultas()->result();
            $data['prodi'] = $this->Panelmodel->getprodi()->result();
            $this->load->view('templates/panel_header');
            $this->load->view('templates/panel_menu');
            $this->load->view('dosen/index',$data);
            $this->load->view('templates/panel_footer');
        }
    }
    public function fakultas(){
    	if ($this->session->userdata('login') != 'zpmlogin' && $this->session->userdata('role_id') != '2') {
    		redirect('Auth');
    	}else{
    		$data['fakul'] = $this->Panelmodel->getfakultas()->result();
    		$this->load->view('templates/panel_header');
		    $this->load->view('templates/panel_menu');
            $this->load->view('fakul/index', $data);
		    $this->load->view('templates/panel_footer');
    	}
    }
    public function penelitian(){
        if ($this->session->userdata('login') != 'zpmlogin' && $this->session->userdata('role_id') != '2'  && $this->session->userdata('role_id') != '1' && $this->session->userdata('role_id') != '3') {
            redirect('Auth');
        }else{

            $data['riset'] = $this->Panelmodel->getriset()->result();

            $this->load->view('templates/panel_header');
            $this->load->view('templates/panel_menu');
            $this->load->view('riset/index', $data);
            $this->load->view('templates/panel_footer');
        }
    }
    public function pengab(){
        if ($this->session->userdata('login') != 'zpmlogin' && $this->session->userdata('role_id') != '2' && $this->session->userdata('role_id') != '1') {
            redirect('Auth');
        }else{

            $data['pengab'] = $this->Panelmodel->getpengab()->result();

            $this->load->view('templates/panel_header');
            $this->load->view('templates/panel_menu');
            $this->load->view('pengab/index', $data);
            $this->load->view('templates/panel_footer');
        }
    }
    public function user(){
        if ($this->session->userdata('login') != 'zpmlogin' && $this->session->userdata('role_id') != '2') {
            redirect('Auth');
        }else{
            $data['user'] = $this->Panelmodel->getuser()->result();
            $data['role'] = $this->Panelmodel->roleuser()->result();
            $this->load->view('templates/panel_header');
            $this->load->view('templates/panel_menu');
            $this->load->view('user/index', $data);
            $this->load->view('templates/panel_footer');
        }
    }

    public function laporan(){
        if ($this->session->userdata('login') != 'zpmlogin' && $this->session->userdata('role_id') != '2' && $this->session->userdata('role_id') != '3' && $this->session->userdata('role_id') != '1') {
            redirect('Auth');
        }else{
            $data['riset'] = $this->Panelmodel->getriset()->result();
            $data['pengab'] = $this->Panelmodel->getpengab()->result();
            $data['fakul'] = $this->Panelmodel->getfakultas()->result();
            $this->load->view('templates/panel_header');
            $this->load->view('templates/panel_menu');
            $this->load->view('laporan/index',$data);
            $this->load->view('templates/panel_footer');
        }
    }
    public function pendidikan(){
        if ($this->session->userdata('login') != 'zpmlogin' && $this->session->userdata('role_id') != '2' && $this->session->userdata('role_id') != '3') {
            redirect('Auth');
        }else{
            $data['pendik'] = $this->Panelmodel->getpendidikan()->result();
            $this->load->view('templates/panel_header');
            $this->load->view('templates/panel_menu');
            $this->load->view('pendidikan/index',$data);
            $this->load->view('templates/panel_footer');
        }
    }

}
