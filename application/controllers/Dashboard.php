//tes

<?php 
defined('BASEPATH') OR exit('no direct script access allowed');

class Dashboard extends CI_Controller {
   

  
   public function index(){
       

        $this->load->view('template/header');
        $this->load->view('home/dashboard');
        $this->load->view('template/footer');
    }
}
