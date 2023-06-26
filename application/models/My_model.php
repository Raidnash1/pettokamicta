<?php 
class My_model extends CI_Model
{
    public function cek_login($u,$p){
        $q=$this->db->get_where('tbl_admin',array('userName'=>$u,'password'=>$p));
        return $q;
    }
   
    // ambil semua data
    public function get_all_data($tabel){
        $q=$this->db->get($tabel);
        return $q;
    }
    // insert data
    public function insert($tabel,$data){
        $this->db->insert($tabel,$data);
    }
    // ambil berdskn id
    public function get_by_id($tabel,$id){
        return $this->db->get_where($tabel,$id);
    }
    // uopdate data
    public function update($tabel,$data,$pk,$id){
        $this->db->where($pk,$id);
        $this->db->update($tabel,$data);
    }
    // hapus data
    public function delete($tabel,$id,$val){
        $this->db->delete($tabel,array($id => $val));
    }

    // cek member
    public function cek_login_member($u,$p){
        $q=$this->db->get_where('tbl_member',array('username'=>$u,'password'=>$p,'statusAktif'=>'Y'));
        return $q;
    }    
    
    

}
