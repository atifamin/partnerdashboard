<?php

class File_manager_model extends CI_Model
{
    public function __construct(){
        parent::__construct();
		$this->partnerDB = $this->load->database('partnerdashboard', TRUE);
    }

    public function get_folders($parent_id, $type_id){
        return  $this->partnerDB
                ->where("parent_id", $parent_id)
                ->where("business_folder_type_id", $type_id)
                ->where("type", "folder")
                ->get("bizvault_filedoc_list")->result();
    }

}