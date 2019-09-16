<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class File_manager extends CI_Controller {
	public function __construct(){
        parent::__construct();
		$this->partnerDB = $this->load->database('partnerdashboard', TRUE);
		$this->load->library('aws3');
    }

	function Tutorial(){
	  parent::Controller();  
	  $this->load->library('breadcrumbcomponent'); 
	}
	public function index(){
		$post = $this->input->post();
		$data = $this->load_file_folders($post);
		$this->load->view("file_manager/index", $data);
	}

	public function load_file_folders($data){
		$data['folderTypes'] = $this->partnerDB->get("bizvault_folder_categories")->result();

		foreach($data['folderTypes'] as $key=>$val):

			$data['folderTypes'][$key]->folders = $this->partnerDB->where("bizvault_default_folder_category_id", $val->bizvault_folder_category_id)->get("bizvault_default_folder_names");
			
			if($data['folderTypes'][$key]->folders->num_rows()>0){
				$data['folderTypes'][$key]->folders = $data['folderTypes'][$key]->folders->result();

				foreach($data['folderTypes'][$key]->folders as $key1=>$val1){
					$data['folderTypes'][$key]->folders[$key1]->completedPercentage = $this->completedPercentage($val1->bizvault_default_folder_id, $data['user_id']);
					$data['folderTypes'][$key]->folders[$key1]->missingFiles = $this->missingFiles($val1->bizvault_default_folder_id, $data['user_id']);
				}
			}
		endforeach;

		$data['userDetail'] = $this->partnerDB->where('user_id', $data['user_id'])->get("user")->row();
		return $data;
	}

	public function completedPercentage($id, $user_id){
		$percent = 0;
		$totalPreFiles = $this->partnerDB->where("bizvault_user_required_filelist_folder_id", $id)->get("bizvault_user_required_filelist");
		$totalFiles = $totalPreFiles->num_rows();
		if($totalFiles>0){
			$uploadedFiles = 0;
			foreach($totalPreFiles->result() as $key=>$val){

				$file = $this->partnerDB->where("bizvault_user_required_filelist_id", $val->bizvault_user_required_filelist_id)->where('bizvault_user_uploaded_required_file_user_id',$user_id)->where('bizvault_user_uploaded_required_file_filename != ', '')->get("bizvault_user_uploaded_required_file");

				if($file->num_rows()>0){
					$file = $file->row();
					$uploadedFiles = $uploadedFiles+1;
				}
			}
			if($uploadedFiles>0){
				$percent = ($uploadedFiles/$totalFiles)*100;
				$percent = number_format($percent);
			}
		}
		return $percent;
	}

	public function missingFiles($id, $user_id){
		$missing = 0;
		$totalPreFiles = $this->partnerDB->where("bizvault_user_required_filelist_folder_id", $id)->get("bizvault_user_required_filelist");
		$totalFiles = $totalPreFiles->num_rows();
		if($totalFiles>0){
			$uploadedFiles = 0;
			foreach($totalPreFiles->result() as $key=>$val){
				$file = $this->partnerDB->where("bizvault_user_required_filelist_id", $val->bizvault_user_required_filelist_id)->where('bizvault_user_uploaded_required_file_user_id',$user_id)->where('bizvault_user_uploaded_required_file_filename != ','')->get("bizvault_user_uploaded_required_file");
				if($file->num_rows()>0){
					$file = $file->row();
					$uploadedFiles = $uploadedFiles+1;
				}
			}

			$missing = $totalFiles - $uploadedFiles;
		}
		return $missing;
	}

	public function load_other_folder(){
		$post = $this->input->post();
		$data['folderType'] = $this->partnerDB->where("bizvault_default_folder_slug", "User uploaded files, documents and records")->get("bizvault_default_folder_names")->row();
		
		$data['sub_folders'] = $this->partnerDB->where("bizvault_user_other_sub_folder_parent_id", $post['parent_id'])->where("bizvault_user_other_sub_folder_user_id", $post['user_id'])->get("bizvault_user_other_sub_folder")->result();
		$data['files'] = $this->partnerDB->where('bizvault_user_other_uploaded_parent_folder_id',$post['parent_id'])
									->get("bizvault_user_other_uploaded_file")
									->result();
		$this->load->view("file_manager/sub_folders", $data);
	}

	public function load_folder(){
		$post = $this->input->post();
		$data['folder'] = $this->partnerDB->where("bizvault_default_folder_id", $post['folder_id'])->get("bizvault_default_folder_names")->row();
		$data['folder']->files = $this->partnerDB->where("bizvault_user_required_filelist_folder_id", $data['folder']->bizvault_default_folder_id)->get("bizvault_user_required_filelist")->result();
		foreach($data['folder']->files as $key=>$val):
			$data['folder']->files[$key]->uploaded = 0;
			$file = $this->partnerDB->where("bizvault_user_uploaded_required_file_user_id", $post['user_id'])->where("bizvault_user_required_filelist_id", $val->bizvault_user_required_filelist_id)->get("bizvault_user_uploaded_required_file");
			if($file->num_rows()>0){
				$file = $file->row();
				$data['folder']->files[$key]->uploaded = 1;
				$data['folder']->files[$key]->file = $file;
			}
		endforeach;
		$data['folder']->completedPercentage = $this->completedPercentage($post['folder_id'], $post['user_id']);
		$data['folder']->missingFiles = $this->missingFiles($post['folder_id'], $post['user_id']);
		$data['user_id'] = $post['user_id'];

		$raw_query = 'SELECT request_access.*, `user`.`user_id`,`user`.`user_fname`,`user`.`user_lname`, `user`.`user_pic`, `partner`.`partner_name`	
			FROM
			request_access,user,partner
			WHERE
			`request_access`.`request_access_user_id` = `user`.`user_id` AND
			`user`.`partner_id` = `partner`.`partner_id` AND `request_access`.`request_access_status` = "pending" AND
			`request_access`.`request_access_filedoc_id` = '. $data['folder']->bizvault_default_folder_id;

		$data['access_request'] = $this->partnerDB->query($raw_query)->result();

		$data['request_access_info'] = $this->partnerDB->SELECT('ra.*,u.user_fname,u.user_lname,u.user_pic,p.partner_name,bdfn.bizvault_default_folder_title_text as file_folder_name')
												->from('request_access as ra')
												->join('user as u','u.user_id = ra.request_access_user_id')
												->join('partner as p','u.partner_id = p.partner_id')
												->join('bizvault_default_folder_names as bdfn','bdfn.bizvault_default_folder_id = ra.request_access_filedoc_id')
												->where('ra.request_access_filedoc_id',$data['folder']->bizvault_default_folder_id)
												->where('ra.request_access_status', 'pending')
												->get()->result();

		$this->load->view("file_manager/load_folder", $data);
	}

	public function create_folder(){
		$post = $this->input->post();
		$insert["bizvault_user_other_sub_folder_parent_id"] = $post["parent_id"];
		$insert["bizvault_user_other_sub_folder_user_id"] = $post["user_id"];
		$insert["bizvault_user_other_sub_folder_title_text"] = $post["folder_name"];
		$insert['bizvault_user_other_sub_folder_slug']	= $this->slug($post["folder_name"], "bizvault_user_other_sub_folder");
		$this->partnerDB->insert("bizvault_user_other_sub_folder", $insert);
		$folderId = $this->partnerDB->insert_id();
		$folder = $this->partnerDB->where("bizvault_user_other_sub_folder_id", $folderId)->get("bizvault_user_other_sub_folder")->row();
		$html = '<div class="col-md-12 folder"  id="folder_id_'.$folder->bizvault_user_other_sub_folder_id.'" folder_id="'.$folder->bizvault_user_other_sub_folder_id.'"><div onclick="open_other_inner_folder('.$folder->bizvault_user_other_sub_folder_id.',\''.$folder->bizvault_user_other_sub_folder_slug.'\')" class="col-md-2 main-folder-area-icon"><i class="fa fa-folder"></i></div><div onclick="open_other_inner_folder('.$folder->bizvault_user_other_sub_folder_id.',\''.$folder->bizvault_user_other_sub_folder_slug.'\')" class="col-md-8 main-folder-area-content"><h3 id="folder_'.$folder->bizvault_user_other_sub_folder_id.'" onblur="change_folder_name('.$folder->bizvault_user_other_sub_folder_id.',$(this).html())" contenteditable="false">'.$folder->bizvault_user_other_sub_folder_title_text.'</h3><p>Updated 3 days ago by testOne 17.5MB</p></div><div class="col-md-2"><span onclick="edit_folder('.$folder->bizvault_user_other_sub_folder_id.')" style="color:#488dc9;" ><i class="fa fa-edit"></i></span>&nbsp;&nbsp;&nbsp;<span onclick="remove_folder('.$folder->bizvault_user_other_sub_folder_id.')" style="color:red"><i class="fa fa-trash"></i></span></div></div>';
		echo $html;
		
	}

	public function open_other_inner_folder(){
		$post = $this->input->post();
		$folder_id = $post['folder_id'];
		$slug = $post['slug'];
	    $data['files_breadcrumb'] = array_reverse($this->breadcrumb($slug));
		//echo "<pre>";print_r($data['files_breadcrumb']);exit;
		// $data['folder'] = $this->partnerDB->where("bizvault_user_other_sub_folder_id", $folder_id)->get("bizvault_user_other_sub_folder")->row();
		$data['folderType'] = $this->partnerDB->where("bizvault_default_folder_slug","User uploaded files, documents and records")->get("bizvault_default_folder_names")->row();
		$data['sub_folders'] = $this->partnerDB->where("bizvault_user_other_sub_folder_parent_id",$folder_id)->get("bizvault_user_other_sub_folder")->result();
		$data['files'] = $this->partnerDB->where('bizvault_user_other_uploaded_parent_folder_id',$folder_id)
							->get("bizvault_user_other_uploaded_file")
							->result();
		$this->load->view("file_manager/sub_folders", $data);
	}


	public function breadcrumb($slug){

		return $this->recursiveForBreadcrumb($slug, array());
	}
	
	public function recursiveForBreadcrumb($slug, $data){ 
		
		$folder = $this->partnerDB->where("bizvault_user_other_sub_folder_slug", $slug)->get("bizvault_user_other_sub_folder")->row();
		$data[] = $folder;

	   $result = $this->partnerDB->where("bizvault_user_other_sub_folder_id",$folder->bizvault_user_other_sub_folder_parent_id)->get("bizvault_user_other_sub_folder")->row();
		if(!empty($result)){
			return $this->recursiveForBreadcrumb($result->bizvault_user_other_sub_folder_slug, $data);
		}
		return $data;
	}

	public function remove_folder(){
        $folder_id = $this->input->post('folder_id');
        if($this->partnerDB->where("bizvault_user_other_sub_folder_id", $folder_id)->delete("bizvault_user_other_sub_folder"))
		{
			return true;
		}else{
			return false;
		}
	}

	public function remove_file(){
		$post = $this->input->post();
		$file = $this->partnerDB->where('bizvault_user_other_uploaded_file_id',$post['file_id'])->get('bizvault_user_other_uploaded_file')->row();
		$this->aws3->delete_bucket_file('partnerdashboard',$file->bizvault_user_other_uploaded_filename);
		//unlink($file->bizvault_user_other_uploaded_full_pathname);
		$this->partnerDB->where("bizvault_user_other_uploaded_file_id", $post['file_id'])->delete("bizvault_user_other_uploaded_file");
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

	public function change_folder_name(){

     $id = $this->input->post('id');
     $name = $this->input->post('name');
     if($this->partnerDB->set('bizvault_user_other_sub_folder_title_text',$name)->where("bizvault_user_other_sub_folder_id", $id)->update("bizvault_user_other_sub_folder"))
        {
            return true;
        }else
        {
        	return false;
        }
	}

	// public function upload_file(){
	// 	$post = $this->input->post();
	// 	$filesCount = count($_FILES['files']['name']);
	// 	$last_id = array();
	// 	for ($i=0; $i < $filesCount ; $i++) { 
	// 		$_FILES['file']['name'] 	= $_FILES['files']['name'][$i];
	// 		$_FILES['file']['type'] 	= $_FILES['files']['type'][$i];
	// 		$_FILES['file']['tmp_name'] = $_FILES['files']['tmp_name'][$i];
 //            $_FILES['file']['error'] 	= $_FILES['files']['error'][$i];
 //            $_FILES['file']['size'] 	= $_FILES['files']['size'][$i];

 //            $uploadPath = './uploads/temp/';
 //            $config['upload_path'] = $uploadPath;
 //            $config['allowed_types'] = '*';
 //            $this->load->library('upload', $config);
 //            if ( ! $this->upload->do_upload('file')){
 //            	$error = array('error' => $this->upload->display_errors());
	// 		}else{
	// 			$fileData = $this->upload->data();
	// 			//$fileData['full_path'] = $this->aws3->sendFile('partnerdashboard',$_FILES['file'][$i]);
	// 			$data['bizvault_user_other_uploaded_parent_folder_id'] = $post['parent_id'];
	// 			$data['bizvault_user_other_uploaded_filename'] 	= $fileData['file_name'];
	// 			$data['bizvault_user_other_uploaded_pathname'] 	= $fileData['file_path'];
	// 			$data['bizvault_user_other_uploaded_file_type'] 	= $fileData['file_type'];
	// 			$data['bizvault_user_other_uploaded_full_pathname'] 	= $fileData['full_path'];
	// 			$data['bizvault_user_other_uploaded_file_extension'] = $fileData['file_ext'];
	// 			$data['bizvault_user_other_uploaded_file_size'] 	= $fileData['file_size'];
	// 			$data["bizvault_user_other_uploaded_creation_date"] = date("Y-m-d H:i:s");
				
	// 			$this->partnerDB->insert("bizvault_user_other_uploaded_file", $data);
				
	// 			array_push($last_id, $this->partnerDB->insert_id());
	// 		}
	// 	}
	// 	$data['files'] = $this->partnerDB->where_in('bizvault_user_other_uploaded_file_id',$last_id)
	// 					->where('bizvault_user_other_uploaded_parent_folder_id',$post['parent_id'])
	// 					->get("bizvault_user_other_uploaded_file")
	// 					->result();
	// 	$this->load->view("file_manager/create_file", $data);
	// }

	public function upload_file(){
		$post = $this->input->post();
		$filesCount = count($_FILES['files']['name']);
		$last_id = array();
		for ($i=0; $i < $filesCount ; $i++) { 
			$_FILES['file']['name'] 	= $_FILES['files']['name'][$i];
			$_FILES['file']['type'] 	= $_FILES['files']['type'][$i];
			$_FILES['file']['tmp_name'] = $_FILES['files']['tmp_name'][$i];
            $_FILES['file']['error'] 	= $_FILES['files']['error'][$i];
            $_FILES['file']['size'] 	= $_FILES['files']['size'][$i];

            $fileData = $this->aws3->sendFile('partnerdashboard',$_FILES['file']);
			$data['bizvault_user_other_uploaded_parent_folder_id'] = $post['parent_id'];
			$data['bizvault_user_other_uploaded_filename'] 	= $fileData['filename'];
			$data['bizvault_user_other_uploaded_pathname'] 	= $fileData['file_path'];
			$data['bizvault_user_other_uploaded_file_type'] 	= $fileData['file_type'];
			$data['bizvault_user_other_uploaded_full_pathname'] 	= $fileData['full_path'];
			$data['bizvault_user_other_uploaded_file_extension'] = ".".$fileData['file_ext'];
			$data['bizvault_user_other_uploaded_file_size'] 	= $fileData['file_size'];
			$data["bizvault_user_other_uploaded_creation_date"] = date("Y-m-d H:i:s");
			
			$this->partnerDB->insert("bizvault_user_other_uploaded_file", $data);
			
			array_push($last_id, $this->partnerDB->insert_id());
		}
		$data['files'] = $this->partnerDB->where_in('bizvault_user_other_uploaded_file_id',$last_id)
						->where('bizvault_user_other_uploaded_parent_folder_id',$post['parent_id'])
						->get("bizvault_user_other_uploaded_file")
						->result();
		$this->load->view("file_manager/create_file", $data);
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
				  ->where("bizvault_user_other_sub_folder_slug", $text)
				  ->get($tblname)->row();
		
		if(!empty($result)){
			$slug = $result->bizvault_user_other_sub_folder_slug;
			$result1 = $this->partnerDB->query("SELECT *
			FROM bizvault_user_other_sub_folder
			WHERE bizvault_user_other_sub_folder_slug LIKE '".$slug."-%'
			ORDER BY bizvault_user_other_sub_folder_slug DESC
			LIMIT 1")->row();

			if(!empty($result1)){
				$counter = explode("-", $result1->bizvault_user_other_sub_folder_slug);
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

	// public function upload_predefied_file(){
	// 	$post = $this->input->post();
	// 	$config['upload_path']          = './uploads/temp/';
	// 	if (!file_exists($config['upload_path'])) {
	// 		mkdir($config['upload_path'], 0777, true);
	// 	}
		
	// 	$file_detail = $this->partnerDB->where('bizvault_user_required_filelist_id', $post['bizvault_user_required_filelist_id'])->get('bizvault_user_required_filelist')->row();
	// 	if($file_detail->bizvault_user_required_filelist_extension != Null){
	// 		$config['allowed_types'] = strtolower($file_detail->bizvault_user_required_filelist_extension);
	// 	}
	// 	else{
	// 		$config['allowed_types'] = '*';
	// 	}
	// 	$this->load->library('upload', $config);
	// 	if ( ! $this->upload->do_upload('file')){
	// 		$error_msg = "File type not Correct only upload ".$file_detail->bizvault_user_required_filelist_extension." files here!";

	// 		setcookie("error_image_loading", $error_msg, time()+15, "/");

	// 		header('Location: '.$post['redirect_url'].'');

	// 	}else{
	// 		$upload_data = array('upload_data' => $this->upload->data());
	// 		$data['bizvault_user_required_filelist_id'] = $post['bizvault_user_required_filelist_id'];
	// 		$data['bizvault_user_uploaded_required_file_user_id'] = $post['user_id'];
	// 		$data['bizvault_user_uploaded_required_default_file_parent_folder_id'] = $post['folder_id'];
	// 		$data["bizvault_user_uploaded_required_file_filename"] = $upload_data['upload_data']['file_name'];
	// 		$data["bizvault_user_uploaded_required_file_pathname"] = $upload_data['upload_data']['file_path'];
	// 		$data['bizvault_user_uploaded_required_file_type'] = $upload_data['upload_data']['file_type'];
	// 		$data["bizvault_user_uploaded_required_file_full_pathname"] = $upload_data['upload_data']['full_path'];
	// 		$data["bizvault_user_uploaded_required_file_extension"] = $upload_data['upload_data']['file_ext'];
	// 		$data["bizvault_user_uploaded_required_file_size"] = $upload_data['upload_data']['file_size'];
	// 		$checkIfUploadedBefore = $this->partnerDB->where("bizvault_user_required_filelist_id", $post['bizvault_user_required_filelist_id'])->where("bizvault_user_uploaded_required_file_user_id", $post['user_id'])->get("bizvault_user_uploaded_required_file");

	// 		if($checkIfUploadedBefore->num_rows()>0){

	// 			$checkIfUploadedBefore = $checkIfUploadedBefore->row();

	// 			//unlink($checkIfUploadedBefore->full_path);
	// 			// $data["updated_at"] = date("Y-m-d H:i:s");
	// 			// $data["updated_by"] = $post["user_id"];
	// 			$this->partnerDB->where("bizvault_user_uploaded_required_file_id", $checkIfUploadedBefore->bizvault_user_uploaded_required_file_id)->update("bizvault_user_uploaded_required_file", $data);
	// 		}else{
	// 			$data["bizvault_user_uploaded_required_file_upload_date"] = date("Y-m-d H:i:s");
				
	// 			$this->partnerDB->insert("bizvault_user_uploaded_required_file", $data);
	// 		}
	// 		//header('Location: '.$post['redirect_url'].'');
	// 	}
		
	// }
	public function upload_predefied_file(){
		$post = $this->input->post();
		$OFT = $_FILES['file']['type'];
		$RFT = explode("/", $OFT);
		$file_type = strtolower(end($RFT));
		
		$file_detail = $this->partnerDB->where('bizvault_user_required_filelist_id', $post['bizvault_user_required_filelist_id'])->get('bizvault_user_required_filelist')->row();
		$dbType = strtolower($file_detail->bizvault_user_required_filelist_extension);

		if (!empty($dbType) && $dbType != $file_type) 
		{
			$error_msg = "File type not Correct only upload ".$dbType." files here!";

			setcookie("error_image_loading", $error_msg, time()+5, "/");

			header('Location: '.$post['redirect_url'].'');
		}else{
			$upload_data = $this->aws3->sendFile('partnerdashboard',$_FILES['file']);
			$data['bizvault_user_required_filelist_id'] = $post['bizvault_user_required_filelist_id'];
			$data['bizvault_user_uploaded_required_file_user_id'] = $post['user_id'];
			$data['bizvault_user_uploaded_required_default_file_parent_folder_id'] = $post['folder_id'];
			$data["bizvault_user_uploaded_required_file_filename"] = $upload_data['filename'];
			$data["bizvault_user_uploaded_required_file_pathname"] = $upload_data['file_path'];
			$data['bizvault_user_uploaded_required_file_type'] = $upload_data['file_type'];
			$data["bizvault_user_uploaded_required_file_full_pathname"] = $upload_data['full_path'];
			$data["bizvault_user_uploaded_required_file_extension"] = ".".$upload_data['file_ext'];
			$data["bizvault_user_uploaded_required_file_size"] = $upload_data['file_size'];
			$checkIfUploadedBefore = $this->partnerDB->where("bizvault_user_required_filelist_id", $post['bizvault_user_required_filelist_id'])->where("bizvault_user_uploaded_required_file_user_id", $post['user_id'])->get("bizvault_user_uploaded_required_file");

			if($checkIfUploadedBefore->num_rows()>0){

				$checkIfUploadedBefore = $checkIfUploadedBefore->row();
				$this->partnerDB->where("bizvault_user_uploaded_required_file_id", $checkIfUploadedBefore->bizvault_user_uploaded_required_file_id)->update("bizvault_user_uploaded_required_file", $data);
			}else{
				$data["bizvault_user_uploaded_required_file_upload_date"] = date("Y-m-d H:i:s");
				
				$this->partnerDB->insert("bizvault_user_uploaded_required_file", $data);
			}
		}
	}

	public function delete_file($id){
		$file = $this->partnerDB->where("bizvault_user_uploaded_required_file_id", $id)->get("bizvault_user_uploaded_required_file")->row();
		
		$this->aws3->delete_bucket_file('partnerdashboard',$file->bizvault_user_uploaded_required_file_filename);

		$this->partnerDB->where("bizvault_user_uploaded_required_file_id", $id)->delete("bizvault_user_uploaded_required_file");
		return redirect($_SERVER['HTTP_REFERER']);
	}

	public function open_grant_access_modal(){
		$request_id = $this->input->post('id');
		$data['request_access_detail'] = $this->partnerDB->SELECT('ra.*,u.user_fname,u.user_lname,u.user_pic,p.partner_name')
											->from('request_access as ra')
											->join('user as u','u.user_id = ra.request_access_user_id')
											->join('partner as p','u.partner_id = p.partner_id')
											->where('ra.request_access_id',$request_id)
											->get()->row();
		$this->load->view('file_manager/open_grant_access_modal', $data);
	} 

	public function grant_deny_request(){
		$post = $this->input->post();
		if ($post['val'] == 'grant') {
			$data['grant_access_user_id'] = $this->session->userdata('user_session')['user_id'];
			$data['grant_access_request_id'] = $post['id'];
			$data['grant_access_type'] = $post['type'];
			$data['grant_access_length'] = $post['length'];
			$data['grant_access_task_id'] = $post['task_id'];
			$data['grant_access_filedoc_id'] = $post['folder_id'];
			$expiryDate = date('Y-m-d', strtotime(date('Y-m-d'). ' + '.$post['length'].' days'));
			$data['grant_access_expiration_date'] = $expiryDate;
			$this->partnerDB->insert('grant_access',$data);
			$this->partnerDB->set('request_access_status','GRANT')
							->where('request_access_id',$post['id'])
							->update('request_access');
		}else{
			$this->partnerDB->set('request_access_status','DENY')
							->where('request_access_id',$post['id'])
							->update('request_access');
		}
	}

	public function file_explanation() {
		$post = $this->input->post();
		// print_r($post); exit;
		$data['bizvault_user_required_filelist_id'] = $post['file_id'];
		$data['bizvault_user_uploaded_required_default_file_parent_folder_id'] = $post['folder_id'];
		$data['bizvault_user_uploaded_required_file_user_id'] = $post['user_id'];
		if ($post['document'] == 'other') {
			$data['bizvault_user_uploaded_required_file_file_explanation'] = $post['other_detail'];
		}else{
			$data['bizvault_user_uploaded_required_file_file_explanation'] = $post['document'];
		}
		$this->partnerDB->insert("bizvault_user_uploaded_required_file",$data);
		
	}
}
