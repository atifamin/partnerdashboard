<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class File_manager extends CI_Controller {
	
	public function __construct(){
        parent::__construct();
        $this->partnerDB = $this->load->database('partnerdashboard', TRUE);
    }

	public function index(){
		$post = $this->input->post();
		$this->load_file_folders($post);
	}

	public function load_file_folders($data){
		$data['folderTypes'] = $this->partnerDB->get("business_folder_type")->result();
		$data['userDetail'] = $this->partnerDB->where('user_id', $data['user_id'])->get("user")->row();
		$this->load->view("file_manager/index", $data);
	}

	public function create_folder(){
		$post = $this->input->post();
		$insert["parent_id"] = $post["parent_id"];
		$insert["type"] = $post["type"];
		$insert["business_folder_type_id"] = $post["business_folder_type_id"];
		$insert["user_id"] = $post["user_id"];
		$insert["name"] = $post["folder_name"];
		$this->partnerDB->insert("business_filedoc_list", $insert);
		$this->load_file_folders($post);
	}

	public function load_main_folders_inputs(){
		$folderTypes = $this->partnerDB->get("business_folder_type")->result();
		$html = '';
		foreach($folderTypes as $key=>$val){
			($val->id==1)? $checked = 'checked="checked"' : $checked = '' ;
			$html .= '<label class="col-md-6" style="padding:1%;">
			<input type="radio" name="folder_type" class="minimal" value="'.$val->id.'" '.$checked.'> '.$val->name.' </label>';
		}
		echo $html;
	}

	public function open_folder(){
		$post = $this->input->post();
		$folder_id = $post['folder_id'];
		$data['folder'] = $this->partnerDB->where("id", $folder_id)->get("business_filedoc_list")->row();
		$data['folderType'] = $this->partnerDB->where("id", $data['folder']->business_folder_type_id)->get("business_folder_type")->row();
		$data['sub_folders'] = $this->partnerDB->where("parent_id", $data['folder']->id)->where("type", "folder")->get("business_filedoc_list")->result();
		//echo "<pre>"; print_r($folderDetail); exit;
		$this->load->view("file_manager/sub_folders", $data);
	}
}
