<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dosen extends CI_Controller 
{
    public function index()
    {
        $data['title']='Dosen';
        $data['user']= $this->db->get_where('user', ['email'=> $this->session->userdata('email')])->row_array();
       
        $this->load->view('dosen/index', $data);
    }
}
