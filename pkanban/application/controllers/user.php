<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class user extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('cookie');
    }

    public function index()
    {

        if ($this->session->userdata('logged') == true) {
            redirect(base_url() . 'index.php/home');
        } else {
            $this->load->view('layout/login');
        }
    }

    public function login()
    {
        
       
            $this->load->view('layout/register_user');
        }

    

    public function logout($board_id = null)
    {

        $this->session->sess_destroy();
        $this->index();

    }
    public function register(){
        $this->load->view('layout/registration');
    }


}
