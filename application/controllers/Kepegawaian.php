<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kepegawaian extends CI_Controller 
{
    public function index()
    {
        $data['title']='Kepegawaian';
        $data['user']= $this->db->get_where('user', ['email'=> $this->session->userdata('email')])->row_array();
       
        $this->load->view('kepegawaian/index', $data);
    }
}
