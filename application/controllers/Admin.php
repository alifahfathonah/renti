<?php

class admin extends CI_Controller
{
    public function __construct()
    {
        parent ::__construct();
        $this->load->model('Model_LPPM');
        $this->load->library('form_validation');
        
    }


    public function index()
    { 
        $data['judul'] = 'Daftar data penelitian';
        $data['admin'] = $this->Model_LPPM->getAlladmin();

        //load library
        $this->load->library('pagination');

        //ambil data keyword
        if($this->input->post('submit')){
        $data['keyword'] = $this->input->post('keyword');
        $this->session->set_userdata('keyword', $data['keyword']);
        } else {
        $data['keyword'] = $this->session->userdata('keyword');
        }

        //config
        $this->db->like('id_penelitian', $data['keyword']);
        $this->db->or_like('id_luaranpenelitian', $data['keyword']);
        $this->db->or_like('judul_penelitian', $data['keyword']);
        $this->db->from('penelitian');
        $config['base_url']='http://localhost/tridharma_univbi/admin/index';
        $config['total_rows']=$this->db->count_all_results();
        $data['total_rows'] = $config['total_rows'];
        $config['per_page']= 2;
        $config['num_links']= 4;

        //styling
        $config['full_tag_open']='<nav><ul class="pagination justify-content-center">';
        $config['full_tag_close']='</ul></nav>';

        $config['first_link']='First';
        $config['first_tag_open']='<li class="page-item">';
        $config['first_tag_close']='</li>';

        $config['last_link']='Last';
        $config['last_tag_open']='<li class="page-item">';
        $config['last_tag_close']='</li>';

        $config['next_link']='&raquo';
        $config['next_tag_open']='<li class="page-item">';
        $config['next_tag_close']='</li>';

        $config['prev_link']='&laquo';
        $config['prev_tag_open']='<li class="page-item">';
        $config['prev_tag_close']='</li>';

        $config['cur_tag_open']='<li class="page-item active"><a class="page-link" href="#">';
        $config['cur_tag_close']='</li>';

           $config['num_tag_open']='<li class="page-item">';
        $config['num_tag_close']='</li>';

        $config['attributes'] = array('class' => 'page-link');

        //initialize
        $this->pagination->initialize($config);

        $data['start']=$this->uri->segment(3);
        $data['admin'] = $this->Model_LPPM->getadmin($config['per_page'], $data['start'], $data['keyword']);

        $this->load->view('templates/auth_header', $data);
        $this->load->view('admin/index', $data);
        $this->load->view('templates/auth_footer');
}
    public function tambah()
    {
        $data['judul'] = 'Form Tambah Data penelitian';

        $this->form_validation->set_rules('id_penelitian', 'id_penelitian', 'required');
        $this->form_validation->set_rules('id_luaranpenelitian', 'id_luaranpenelitian', 'required');
        $this->form_validation->set_rules('judul_penelitian', 'judul_penelitian', 'required');
        $this->form_validation->set_rules('tahun_penelitian', 'tahun_penelitian', 'required');
        $this->form_validation->set_rules('sumber_dana', 'sumber_dana', 'required');
        $this->form_validation->set_rules('lampiran', 'lampiran', 'required');

        if( $this->form_validation->run() == FAlSE ) {
            $this->load->view('templates/auth_header', $data);
            $this->load->view('admin/tambah');
            $this->load->view('templates/auth_footer');
        } else {
            $this->model_LPPM->tambahDatapenelitian();
            $this->session->set_flashdata('flash', 'Ditambahkan');
            redirect('admin');
        }
       
    }       
        public function hapus($id_penelitian)
        {
            $id['id_penelitian'] = $this->uri->segment(3);
        
            $this->Model_LPPM->hapus($id);
        
            //redirect
            redirect('admin');
        
        }
        public function ubah($penelitian)
        {
            $id_penelitian = $this->uri->segment(3);

            $data = array(

            'judul'     => 'Edit Data penelitian',
            'admin' => $this->Model_LPPM->ubah($penelitian)

            );
            $this->load->view('templates/auth_header', $data);
            $this->load->view('admin/ubah', $data);
            $this->load->view('templates/auth_footer');
        }

        public function update()
        {
            $id['penelitian'] = $this->input->post("penelitian");
            $data = array(
        
                'id_penelitian'         => $this->input->post("id_penelitian"),
                'id_luaranpenelitian'    => $this->input->post("id_luaranpenelitian"),
                'judul_penelitian'         => $this->input->post("judul_penelitian"),
                'tahun_penelitian'         => $this->input->post("tahun_penelitian"),
                'sumber_dana'                => $this->input->post("sumber_dana"),
                'lampiran_filehasil'         => $this->input->post("lampiran_filehasil"),
            );
                $this->Model_LPPM->update($data, $id);
        
                $this->session->set_flashdata('notif', '<div class="alert alert-success alert-dismissible"> Success! data berhasil diupdate didatabase.
                                                        </div>');
        
                //redirect
                redirect('admin');
            }
        
    }
