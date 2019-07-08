<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_registration extends CI_Controller
{

  

    public function index()
    {
        
      $post = $this->input->post();
     $post = array('user_email' =>$this->input->post('user_email') ,'user_password' => md5($this->input->post('user_password')) );
     // print_r($post);exit();
      $mail=$this->db->where('user_email',$post['user_email'])->get('users')->row();
       if ($mail==true) {
          $this->session->set_flashdata('error','email already exist ');
          $this->load->view('layout/registration');
       }
      //print_r($mail);exit();
      else{
      $this->load->model('Registration');
      $result =$this->Registration->insert_Data($post);
      if(!$result){
            $this->session->set_flashdata('error','Failed to Insert Record');
        }else{
            $this->session->set_flashdata("success","New User Inserted Successfuly");
        }
   
      //$this->load->view('layout/login');
        redirect('user/login');
    }

    }


}
