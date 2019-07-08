<?php  
 class Registration extends CI_Model  
 {  
    public function insert_Data($post)
    {
       // echo "string";
       $q = $this->db->insert('users', $post);
       // print_r($q);exit();
       return $q;
       
    

    }   
    // public function check_mail($post){
    // 	//print_r($post);exit;
    // 	$this->db->where('user_email',$post['user_email']);
    // 	$this->db->get('users');
    	
    // }

  }

 ?>     