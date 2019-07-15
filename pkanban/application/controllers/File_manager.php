<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class File_manager extends CI_Controller {
	
	public function __construct(){
        parent::__construct();
		$this->partnerDB = $this->load->database('partnerdashboard', TRUE);
    }

	function Tutorial(){
	  parent::Controller();  
	  $this->load->library('breadcrumbcomponent'); 
	}
	public function index(){
		$post = $this->input->post();
		$this->load_file_folders($post);
	}

	public function load_file_folders($data){
		$data['folderTypes'] = $this->partnerDB->where("parent_id", $data['parent_id'])->get("bizvault_files_and_folders")->result();
		$data['userDetail'] = $this->partnerDB->where('user_id', $data['user_id'])->get("user")->row();
		$this->load->view("file_manager/index", $data);
	}

	public function load_other_folder(){
		$post = $this->input->post();
		$data['folderType'] = $this->partnerDB->where("slug", "other")->get("bizvault_files_and_folders")->row();
		$data['sub_folders'] = $this->partnerDB->where("parent_id", $post['parent_id'])->where("type", "folder")->where("business_folder_type_id", $data['folderType']->id)->get("bizvault_filedoc_list")->result();
		//echo "<pre>"; print_r($data); exit;
		$data['business_folder_type_id'] = $data['folderType']->id;
		$this->load->view("file_manager/sub_folders", $data);
	}

	public function load_business_folder(){
		$post = $this->input->post();
		$data['files'] = $this->partnerDB->where("user_id", $post['user_id'])->where("business_folder_type_id", $post['business_folder_type_id'])->where("business_file_type", $post['files_type'])->get("bizvault_filedoc_list")->result();
		$this->load->view("file_manager/business_files", $data);
	}

	public function create_folder(){
		$post = $this->input->post();
		$insert["parent_id"] = $post["parent_id"];
		$insert["type"] = $post["type"];
		$insert["business_folder_type_id"] = $post["business_folder_type_id"];
		$insert["user_id"] = $post["user_id"];
		$insert["name"] = $post["folder_name"];
		$insert['slug']	= $this->slug($post["folder_name"], "bizvault_filedoc_list");
		$this->partnerDB->insert("bizvault_filedoc_list", $insert);
		$folderId = $this->partnerDB->insert_id();
		$folder = $this->partnerDB->where("id", $folderId)->get("bizvault_filedoc_list")->row();
		$html = '<div class="col-md-12 folder"  id="folder_id_'.$folder->id.'" folder_id="'.$folder->id.'"><div onclick="open_folder('.$folder->id.',\''.$folder->slug.'\')" class="col-md-2 main-folder-area-icon"><i class="fa fa-folder"></i></div><div onclick="open_folder('.$folder->id.',\''.$folder->slug.'\')" class="col-md-8 main-folder-area-content"><h3 id="folder_'.$folder->id.'" onblur="change_folder_name('.$folder->id.',$(this).html())" contenteditable="false">'.$folder->name.'</h3><p>Updated 3 days ago by testOne 17.5MB</p></div><div class="col-md-2"><span onclick="edit_folder('.$folder->id.')" style="color:#488dc9;" ><i class="fa fa-edit"></i></span>&nbsp;&nbsp;&nbsp;<span onclick="remove_folder('.$folder->id.')" style="color:red"><i class="fa fa-trash"></i></span></div></div>';
		echo $html;
		//$this->load_file_folders($post);
		//$data['folder'] = $this->partnerDB->where("id", $folder_id)->get("bizvault_filedoc_list")->row();
		// $data['folderType'] = $this->partnerDB->where("id", $data['folder']->business_folder_type_id)->get("bizvault_files_and_folders")->row();
		// $data['sub_folders'] = $this->partnerDB->where("parent_id", $data['folder']->id)->where("type", "folder")->get("bizvault_filedoc_list")->result();
		// $this->load->view("file_manager/sub_folders", $data);
	}

	// public function load_main_folders_inputs(){
	// 	$folderTypes = $this->partnerDB->get("bizvault_files_and_folders")->result();
	// 	$html = '';
	// 	foreach($folderTypes as $key=>$val){
	// 		($val->id==1)? $checked = 'checked="checked"' : $checked = '' ;
	// 		$html .= '<label class="col-md-6" style="padding:1%;">
	// 		<input type="radio" name="folder_type" class="minimal" value="'.$val->id.'" '.$checked.'> '.$val->name.' </label>';
	// 	}
	// 	echo $html;
	// }

	public function open_folder(){
		$post = $this->input->post();
		$folder_id = $post['folder_id'];
		$slug = $post['slug'];
	    $data['files_breadcrumb'] = array_reverse($this->breadcrumb($slug));

		//echo "<pre>";print_r($data['files_breadcrumb']);exit;
		$data['folder'] = $this->partnerDB->where("id", $folder_id)->get("bizvault_filedoc_list")->row();
		$data['folderType'] = $this->partnerDB->where("id", $data['folder']->business_folder_type_id)->get("bizvault_files_and_folders")->row();
		$data['sub_folders'] = $this->partnerDB->where("parent_id", $data['folder']->id)->where("type", "folder")->get("bizvault_filedoc_list")->result();
		//echo "<pre>"; print_r($data); exit;
		$this->load->view("file_manager/sub_folders", $data);
	}


	public function breadcrumb($slug){

		return $this->recursiveForBreadcrumb($slug, array());
	}
	
	public function recursiveForBreadcrumb($slug, $data){ 
		

		$folder = $this->partnerDB->where("slug", $slug)->get("bizvault_filedoc_list")->row();
		$data[] = $folder;

	

	   $result = $this->partnerDB->where("id",$folder->parent_id)->get("bizvault_filedoc_list")->row();
		if(!empty($result)){
			return $this->recursiveForBreadcrumb($result->slug, $data);
		}
		return $data;
	}

	public function remove_folder(){
        $folder_id = $this->input->post('folder_id');
        if($this->partnerDB->where("id", $folder_id)->delete("bizvault_filedoc_list"))
          {
            return true;

          }else{
        	     return false;
                }
	}

	public function load_company_logo(){
		$user_id = $this->input->post('user_id');
		$query = 'select user.user_fname , user.user_lname , dbe.`Firm/DBA name` as firm_name , dbe.Logo from user left join dbe ON user.dbe_firm_id = dbe.`Firm ID` where user.user_id = "'.$user_id.'"';
		$data = $this->partnerDB->query($query)->row();
		$word = explode(" ", ucwords($data->firm_name));
		$business_name = " ";
		foreach ($word as $w) {
			$business_name .= $w[0];
		}
		
		$text = '<div class="col-md-1" style="width: 6%">';
		if (!empty($data->Logo)) $text .= '<img style="width: 50px;border-radius: 25px" src="'.base_url().'uploads/'.$data->Logo.'">';
		else $text .= '
		<div style="width: 50px;height: 50px;border-radius: 25px;background: #0f7cbb;">
		<span style="color: #ffff;position: relative;margin-left: 13px;top:13px">'.substr($business_name, 0,4).'</span></div>';
		$text .= '</div>
		<div class="col-md-4" style="padding-left: 0;font-size:13px"><span>'.$data->user_fname.' '.$data->user_lname.'</span><br><span style="font-size: 18px">'.$data->firm_name.'</span></div>';

		echo $text;
	} 

	//http://localhost/partnerdashboard/pkanban/uploads/face1.jpg

	public function change_folder_name(){

     $id = $this->input->post('id');
     $name = $this->input->post('name');
     if($this->partnerDB->set('name',$name)->where("id", $id)->update("bizvault_filedoc_list"))
        {
            return true;
        }else
             {
        	   return false;
             }
	}

	public function upload_file(){
		$filesCount = count($_FILES['file']['name']);
		for ($i=0; $i < $filesCount ; $i++) { 
			$name = $_FILES['file']['name'][$i];
			$type = $_FILES['file']['type'][$i];
			$tmp_name = $_FILES['file']['tmp_name'][$i];
            $error = $_FILES['file']['error'][$i];
            $size = $_FILES['file']['size'][$i];

			// File upload configuration
            $uploadPath = 'uploads/';
            $config['upload_path'] = $uploadPath;
            $config['allowed_types'] = 'jpg|jpeg|png|gif';

			echo "<pre>"; print_r($_FILES);
		}
	// 	if(count($_FILES["file"]["name"])>0){
	// 		print_r($_FILES['file']['name']);	
	// 	}
		
	// 	exit;
	}



	public function slug($text, $tblname){
		$text = str_replace("'", "", $text);
		$text = preg_replace('~[^\\pL\d]+~u', '-', $text);
		$text = trim($text, '-');
		$text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);
		$text = strtolower($text);
		$text = preg_replace('~[^-\w]+~', '', $text);
		if (empty($text)) return 'n-a';
		
		$result = $this->partnerDB
				  ->where("slug", $text)
				  ->get($tblname)->row();
		
		if(!empty($result)){
			$slug = $result->slug;
			$result1 = $this->partnerDB->query("SELECT *
			FROM bizvault_filedoc_list
			WHERE slug LIKE '".$slug."-%'
			ORDER BY slug DESC
			LIMIT 1")->row();

			if(!empty($result1)){
				$counter = explode("-", $result1->slug);
				$counter = end($counter);
				$counter++;
				$text = $text.'-'.($counter);
				return $text;
			}else{
				$counter = 0;
				$counter++;
				$text = $text.'-'.($counter);
				return $text;
			}
		}
		return $text;
	}

}
