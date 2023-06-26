<?php 
defined ('BASEPATH') OR exit();

class Page extends CI_Controller {
    function __construct(){
        parent ::__construct();

        $this->load->model('My_model','m');
        $this->load->helper('form');
        $this->load->helper('url');
        
    }

    function index(){
        $data['title']="BELAJAR CRUD AJAX";
        $this->load->view('home',$data);
    }

    public function ambildata(){
        // $data['title']="BELAJAR CRUD AJAX";
        $dataBarang =$this->m->get_all_data('tbl_barang')->result();
       
        echo json_encode($dataBarang);
    }

    public function tambahdata(){
        $kode=$this->input->post('kode');
        $nama=$this->input->post('nama');
        $harga=$this->input->post('harga');
        $stok=$this->input->post('stok');

        
        
        if ($kode == '') {
            $result['pesan']="kode wajib di isi";
        }elseif ($nama == '') {
            $result['pesan']="nama wajib di isi";
        }elseif ($harga == '') {
            $result['pesan']="harga wajib di isi";
        }elseif ($stok == '') {
            $result['pesan']="stok wajib di isi";
        }else{
            $result['pesan']="";
            
            $data =array(
            'kode' => $kode,
            'nama' => $nama,
            'harga' => $harga,
            'stok' => $stok,
        );
        $this->m->insert('tbl_barang',$data);
        }        
        echo json_encode($result);
        
    }

    public function get_by_id(){
        $id=$this->input->post('id');
        $dataWhere =array('id'=>$id);
        $dataBarang=$this->m->get_by_id('tbl_barang',$dataWhere)->result();
        
        // var_dump($dataBarang);
        // echo $id;
        echo json_encode($dataBarang);
    }

    public function editData(){
        $id=$this->input->post('id');
        $kode=$this->input->post('kode');
        $nama=$this->input->post('nama');
        $harga=$this->input->post('harga');
        $stok=$this->input->post('stok');

        if ($kode == '') {
            $result['pesan']="kode wajib di isi";
        }elseif ($nama == '') {
            $result['pesan']="nama wajib di isi";
        }elseif ($harga == '') {
            $result['pesan']="harga wajib di isi";
        }elseif ($stok == '') {
            $result['pesan']="stok wajib di isi";
        }else{
            $result['pesan']="";
            
            $data =array(
            'id'   => $id,
            'kode' => $kode,
            'nama' => $nama,
            'harga' => $harga,
            'stok' => $stok,
        );
        $this->m->update('tbl_barang',$data,'id',$id);
        }        
        echo json_encode($result);
        
    }

    public function delete(){

        $id=$this->input->post('id');

        if($id == ''){
            $result="kosong";
        }else{
            $result="success";
            $this->m->delete('tbl_barang','id',$id);
           
        }
        echo json_encode($result);
    }

        
}//end controllers

 ?>