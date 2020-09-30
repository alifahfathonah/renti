<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sekretaris extends CI_Controller 
{
    public function index()
    {
        $data['title']='Sekretaris Rektor';
        $data['user']= $this->db->get_where('user', ['email'=> $this->session->userdata('email')])->row_array();
       
        $this->load->view('sekretaris/index', $data);
    }
}
