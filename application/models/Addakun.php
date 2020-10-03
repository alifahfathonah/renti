<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Addakun extends CI_Model {
 	public function add($data){
        $this->name = $data['nama_dosen'];
        $this->email = $data['email'];
        $this->role_id = 3;
        $this->is_active = 1;
        $this->date_created = $data['date_created'];
        $this->image = 'default.jpg';
        $this->password = $data['pass'];
        $this->db->insert('user', $this);
        return;
    }
    public function akunupdate($where,$data){
        $this->db->where($where);
        $this->db->update('user',$data);
        return;
    }
    public function hapusakun($id){
        $this->db->where('id',$id);
        $this->db->delete('user');
       return;
    }

}