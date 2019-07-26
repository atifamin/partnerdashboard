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
		$data = $this->load_file_folders($post);
		$this->load->view("file_manager/index", $data);
	}

	public function load_file_folders($data){
		$data['folderTypes'] = $this->partnerDB->where("type", "category")->get("bizvault_files_and_folders")->result();
		foreach($data['folderTypes'] as $key=>$val):
			$data['folderTypes'][$key]->folders = $this->partnerDB->where("parent_id", $val->id)->get("bizvault_files_and_folders");
			if($data['folderTypes'][$key]->folders->num_rows()>0){
				$data['folderTypes'][$key]->folders = $data['folderTypes'][$key]->folders->result();
				foreach($data['folderTypes'][$key]->folders as $key1=>$val1){
					$data['folderTypes'][$key]->folders[$key1]->completedPercentage = $this->completedPercentage($val1->id, $data['user_id']);
					$data['folderTypes'][$key]->folders[$key1]->missingFiles = $this->missingFiles($val1->id, $data['user_id']);
				}
			}
		endforeach;
		//echo "<pre>"; print_r($data); exit;
		$data['userDetail'] = $this->partnerDB->where('user_id', $data['user_id'])->get("user")->row();
		return $data;
	}

	public function completedPercentage($id, $user_id){
		$percent = 0;
		$totalPreFiles = $this->partnerDB->where("parent_id", $id)->where("type", "file")->get("bizvault_files_and_folders");
		$totalFiles = $totalPreFiles->num_rows();
		if($totalFiles>0){
			$uploadedFiles = 0;
			foreach($totalPreFiles->result() as $key=>$val){
				$file = $this->partnerDB->where("bizvault_files_and_folders_id", $val->id)->get("bizvault_filedoc_list");
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
		$totalPreFiles = $this->partnerDB->where("parent_id", $id)->where("type", "file")->get("bizvault_files_and_folders");
		$totalFiles = $totalPreFiles->num_rows();
		if($totalFiles>0){
			$uploadedFiles = 0;
			foreach($totalPreFiles->result() as $key=>$val){
				$file = $this->partnerDB->where("bizvault_files_and_folders_id", $val->id)->get("bizvault_filedoc_list");
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
		$data['folderType'] = $this->partnerDB->where("slug", "other")->get("bizvault_files_and_folders")->row();
		//echo "<pre>"; print_r($data['folderType']);exit;
		$data['sub_folders'] = $this->partnerDB->where("parent_id", $post['parent_id'])->where("type", "folder")->where("bizvault_files_and_folders_id", $data['folderType']->id)->get("bizvault_filedoc_list")->result();
		$data['bizvault_files_and_folders_id'] = $data['folderType']->id;
		$data['files'] = $this->partnerDB->where('parent_id',$post['parent_id'])
									->where('type','file')
									->where('user_id',$post['user_id'])
									->where("bizvault_files_and_folders_id", $data['folderType']->id)
									->get("bizvault_filedoc_list")
									->result();
		//echo "<pre>"; print_r($data['files']); exit;
		$this->load->view("file_manager/sub_folders", $data);
	}

	public function load_folder(){
		$post = $this->input->post();
		//$post['folder_id']='5';
		//$post['user_id']='5001';

		//echo "<pre>"; print_r($post); exit;
		$data['folder'] = $this->partnerDB->where("id", $post['folder_id'])->get("bizvault_files_and_folders")->row();
		$data['folder']->files = $this->partnerDB->where("parent_id", $data['folder']->id)->where("type", "file")->get("bizvault_files_and_folders")->result();
		foreach($data['folder']->files as $key=>$val):
			$data['folder']->files[$key]->uploaded = 0;
			$file = $this->partnerDB->where("user_id", $post['user_id'])->where("bizvault_files_and_folders_id", $val->id)->get("bizvault_filedoc_list");
			if($file->num_rows()>0){
				$file = $file->row();
				$data['folder']->files[$key]->uploaded = 1;
				$data['folder']->files[$key]->file = $file;
			}
		endforeach;
		$data['folder']->completedPercentage = $this->completedPercentage($post['folder_id'], $post['user_id']);
		$data['folder']->missingFiles = $this->missingFiles($post['folder_id'], $post['user_id']);
		$data['user_id'] = $post['user_id'];
		//echo "<pre>"; print_r($data['folder']); exit;
		$raw_query = 'SELECT request_access.request_access_id, request_access.request_access_type, request_access.request_access_timestamp, user.user_id,user.user_fname, request_access.request_access_length, user.user_lname, user.dbe_firm_id, 
			dbe.`Firm/DBA Name` as FirmName
			FROM
			request_access,user,dbe
			WHERE
			request_access.request_access_user_id = user.user_id AND
			user.dbe_firm_id = dbe.`Firm ID` AND
			request_access.request_access_filedoc_id='. $data['folder']->id;
		$data['access_request'] = $this->partnerDB->query($raw_query)->result();

/*


		$data['access_request'] = $this->partnerDB->select("request_access.request_access_id, request_access.request_access_type, request_access.request_access_timestamp, user.user_id,user.user_fname, request_access.request_access_length, user.user_lname, user.dbe_firm_id, dbe.`Firm/DBA&nbsp;Name`")
							        ->from("request_access")
							        ->join("user","request_access.request_access_user_id = user.user_id")
							        ->join("dbe","user.dbe_firm_id = dbe.`Firm&nbsp;ID`")
							        ->where("request_access.request_access_filedoc_id", $data['folder']->id)
							        ->get()
							        ->result();
*/
		//echo "<pre>"; print_r($data['access_request']); exit;
		$this->load->view("file_manager/load_folder", $data);
	}

	public function create_folder(){
		$post = $this->input->post();
		$insert["parent_id"] = $post["parent_id"];
		$insert["type"] = $post["type"];
		$insert["bizvault_files_and_folders_id"] = $post["bizvault_files_and_folders_id"];
		$insert["user_id"] = $post["user_id"];
		$insert["name"] = $post["folder_name"];
		$insert['slug']	= $this->slug($post["folder_name"], "bizvault_filedoc_list");
		$this->partnerDB->insert("bizvault_filedoc_list", $insert);
		$folderId = $this->partnerDB->insert_id();
		$folder = $this->partnerDB->where("id", $folderId)->get("bizvault_filedoc_list")->row();
		$html = '<div class="col-md-12 folder"  id="folder_id_'.$folder->id.'" folder_id="'.$folder->id.'"><div onclick="open_other_inner_folder('.$folder->id.',\''.$folder->slug.'\')" class="col-md-2 main-folder-area-icon"><i class="fa fa-folder"></i></div><div onclick="open_other_inner_folder('.$folder->id.',\''.$folder->slug.'\')" class="col-md-8 main-folder-area-content"><h3 id="folder_'.$folder->id.'" onblur="change_folder_name('.$folder->id.',$(this).html())" contenteditable="false">'.$folder->name.'</h3><p>Updated 3 days ago by testOne 17.5MB</p></div><div class="col-md-2"><span onclick="edit_folder('.$folder->id.')" style="color:#488dc9;" ><i class="fa fa-edit"></i></span>&nbsp;&nbsp;&nbsp;<span onclick="remove_folder('.$folder->id.')" style="color:red"><i class="fa fa-trash"></i></span></div></div>';
		echo $html;
		//$this->load_file_folders($post);
		//$data['folder'] = $this->partnerDB->where("id", $folder_id)->get("bizvault_filedoc_list")->row();
		// $data['folderType'] = $this->partnerDB->where("id", $data['folder']->bizvault_files_and_folders_id)->get("bizvault_files_and_folders")->row();
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

	public function open_other_inner_folder(){
		$post = $this->input->post();
		$folder_id = $post['folder_id'];
		$slug = $post['slug'];
	    $data['files_breadcrumb'] = array_reverse($this->breadcrumb($slug));

		//echo "<pre>";print_r($data['files_breadcrumb']);exit;
		$data['folder'] = $this->partnerDB->where("id", $folder_id)->get("bizvault_filedoc_list")->row();
		;
		$data['folderType'] = $this->partnerDB->where("id", $data['folder']->bizvault_files_and_folders_id)->get("bizvault_files_and_folders")->row();
		$data['sub_folders'] = $this->partnerDB->where("parent_id", $data['folder']->id)->where("type", "folder")->get("bizvault_filedoc_list")->result();
		$data['files'] = $this->partnerDB->where('parent_id',$folder_id)
									->where('type','file')
									->where("bizvault_files_and_folders_id", $data['folderType']->id)
									->get("bizvault_filedoc_list")
									->result();
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

	public function remove_file(){
		$post = $this->input->post();
		$file = $this->partnerDB->where('id',$post['file_id'])->get('bizvault_filedoc_list')->row();\
		unlink($file->full_path);
		$this->partnerDB->where("id", $post['file_id'])->delete("bizvault_filedoc_list");
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
     if($this->partnerDB->set('name',$name)->where("id", $id)->update("bizvault_filedoc_list"))
        {
            return true;
        }else
        {
        	return false;
        }
	}

	public function upload_file(){
		$post = $this->input->post();
		$filesCount = count($_FILES['files']['name']);
		//print_r($filesCount);exit;
		$last_id = array();
		for ($i=0; $i < $filesCount ; $i++) { 
			$_FILES['file']['name'] 	= $_FILES['files']['name'][$i];
			$_FILES['file']['type'] 	= $_FILES['files']['type'][$i];
			$_FILES['file']['tmp_name'] = $_FILES['files']['tmp_name'][$i];
            $_FILES['file']['error'] 	= $_FILES['files']['error'][$i];
            $_FILES['file']['size'] 	= $_FILES['files']['size'][$i];

            $uploadPath = './uploads/temp/';
            $config['upload_path'] = $uploadPath;
            $config['allowed_types'] = '*';
            $this->load->library('upload', $config);
            if ( ! $this->upload->do_upload('file')){
            	$error = array('error' => $this->upload->display_errors());
				// print_r($error);exit;
				//header('Location: '.$post['redirect_url'].'');
			}else{
				$fileData = $this->upload->data();
				$data['parent_id'] = $post['parent_id'];
				$data['type'] = 'file';
				$data['bizvault_files_and_folders_id'] = $post['bizvault_files_and_folders_id'];
				$data['user_id'] 	= $post['user_id'];
				$data["name"] 		= $fileData['orig_name'];
				$data['file_name'] 	= $fileData['file_name'];
				$data['file_path'] 	= $fileData['file_path'];
				$data['file_type'] 	= $fileData['file_type'];
				$data['full_path'] 	= $fileData['full_path'];
				$data['file_extension'] = $fileData['file_ext'];
				$data['file_size'] 	= $fileData['file_size'];
				$data["created_at"] = date("Y-m-d H:i:s");
				$data["created_by"] = $post["user_id"];
				$data["updated_at"] = date("Y-m-d H:i:s");
				$data["updated_by"] = $post["user_id"];
				
				$this->partnerDB->insert("bizvault_filedoc_list", $data);
				
				array_push($last_id, $this->partnerDB->insert_id());
			}
		}
		$data['files'] = $this->partnerDB->where_in('id',$last_id)
									->where('type','file')
									->where('bizvault_files_and_folders_id',$post['bizvault_files_and_folders_id'])
									->where('user_id',$post['user_id'])
									->get("bizvault_filedoc_list")
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

	public function upload_predefied_file(){
		$post = $this->input->post();
		$config['upload_path']          = './uploads/temp/';
		if (!file_exists($config['upload_path'])) {
			mkdir($config['upload_path'], 0777, true);
		}
		$config['allowed_types']        = '*';
		$this->load->library('upload', $config);
		if ( ! $this->upload->do_upload('file')){
			header('Location: '.$post['redirect_url'].'');
			//$error = array('error' => $this->upload->display_errors());
			//echo "<pre>"; print_r($error); exit;
		}else{
			$upload_data = array('upload_data' => $this->upload->data());
			$data['parent_id'] = 0;
			$data['type'] = 'file';
			$data['bizvault_files_and_folders_id'] = $post['bizvault_files_and_folders_id'];
			$data['user_id'] = $post['user_id'];
			$data["name"] = $upload_data['upload_data']['orig_name'];
			$data["file_name"] = $upload_data['upload_data']['file_name'];
			$data["file_path"] = $upload_data['upload_data']['file_path'];
			$data['file_type'] = $upload_data['upload_data']['file_type'];
			$data["full_path"] = $upload_data['upload_data']['full_path'];
			$data["file_extension"] = $upload_data['upload_data']['file_ext'];
			$data["file_size"] = $upload_data['upload_data']['file_size'];
			//echo "<pre>"; print_r($data); exit;
			$checkIfUploadedBefore = $this->partnerDB->where("bizvault_files_and_folders_id", $post['bizvault_files_and_folders_id'])->where("user_id", $post['user_id'])->get("bizvault_filedoc_list");
			if($checkIfUploadedBefore->num_rows()>0){
				$checkIfUploadedBefore = $checkIfUploadedBefore->row();
				unlink($checkIfUploadedBefore->full_path);
				$data["updated_at"] = date("Y-m-d H:i:s");
				$data["updated_by"] = $post["user_id"];
				$this->partnerDB->where("id", $checkIfUploadedBefore->id)->update("bizvault_filedoc_list", $data);
			}else{
				$data["created_at"] = date("Y-m-d H:i:s");
				$data["created_by"] = $post["user_id"];
				$data["updated_at"] = date("Y-m-d H:i:s");
				$data["updated_by"] = $post["user_id"];
				$this->partnerDB->insert("bizvault_filedoc_list", $data);
			}
			header('Location: '.$post['redirect_url'].'');
		}
		
	}

	public function delete_file($id){
		$file = $this->partnerDB->where("id", $id)->get("bizvault_filedoc_list")->row();
		unlink($file->full_path);
		$this->partnerDB->where("id", $id)->delete("bizvault_filedoc_list");
		return redirect($_SERVER['HTTP_REFERER']);
	}

}
