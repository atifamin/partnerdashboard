<?php
require_once ('includes/config.php');

if (is_ajax())
{
	if (!isset($db))
	{
		include_once ("includes/class.db.php");
		// MySQL

		$db = new db(DB_DSN, DB_USER, DB_PASSWORD);
	}

	if (isset($_REQUEST["action"]) && !empty($_REQUEST["action"]))
	{ //Checks if action value exists
		$action = trim($_REQUEST["action"]);
		switch ($action)
		{

			// Switch case for value of action

		case "savenews":
			savenews();
			break;
		case "activenews":
			activenews();
			break;
		case "deletenews":
			deletenews();
			break;	
		case "getnewslist":
			getnewslist();
			break;
	    case "getalertslist":
			getalertslist();
			break;
		case "activealerts":
			activealerts();
			break;
		}
	}
}

function is_ajax()
{
	//return isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest';
	return true;
}

function checknewsexist($news_title, $news_id)
{
	global $db;
	if (!isset($db))
	{
		include_once ("class.db.php");

		// MySQL

		$db = new db(DB_DSN, DB_USER, DB_PASSWORD);
	}

	if ($news_id == "")
	{
		$q = $db->prepare("SELECT count(*) FROM news 
    									WHERE 
    									title like :title");
		$q->bindParam(':title', $news_title, PDO::PARAM_STR);
	}
	else
	{
		$q = $db->prepare("SELECT count(*) FROM news 
    									WHERE 
    									title like :title 
    									and
    									id != :id");
		$q->bindParam(':title', $news_title, PDO::PARAM_STR);
		$q->bindParam(':id', $news_id, PDO::PARAM_STR);
	}

	if ($q->execute())
	{
		if ($q->fetchColumn() > 0)
		{
			return true;
		}
		else
		{
			return false;
		}
	}
}

function getnewslist()
{
	global $db;
	if (!isset($db))
	{
		include_once ("class.db.php");

		// MySQL

		$db = new db(DB_DSN, DB_USER, DB_PASSWORD);
	}

	$sql = "SELECT * , DATE_FORMAT(N.published_at,'%b %d %Y') as news_date FROM news AS N";
	$result = $db->prepare($sql);
	$ret = array();
	
	if ($result->execute())
	{
		$news_list = $result->fetchAll(PDO::FETCH_ASSOC);
		if (count($news_list))
		{
			$cnt = 0;
			foreach($news_list as $data)
			{
				$jsonobj = $data;
				if($data['news_photo'] != "")
				{
					$news_photo_path = $data['news_photo'];	
					$jsonobj['published_at'] = date('m/d/y',strtotime($data['published_at']));
					if(file_exists($data['news_photo']))
					{
						$jsonobj['news_photo_path'] = $news_photo_path;
					}
					
				}
        		$json_attr = htmlspecialchars(json_encode($jsonobj), ENT_QUOTES, 'UTF-8');
				$item['news_title'] = $data['title'];
				$news_id =  $data['id'];
				$item['news_date'] = $data['news_date'];
				$style = "";
				if(strlen($data['description']) > 400)
				{
					$style = "height:100px;overflow-y: scroll";
				}
				$item['news_desc'] = '<div style="'.$style.'" class="text-truncate">'.$data['description'].'</div>';
				

				
				
				if($data['active'] == 0)
				{
					$active = '<label class="radio-inline"><input data-id="'.$news_id.'" type="radio" value="1" class="rbactive" name="rbactive'.$cnt.'">Active</label>';
					$active .= '<label class="radio-inline"><input data-id="'.$news_id.'" type="radio" value="0" checked class="rbactive" name="rbactive'.$cnt.'">Inactive</label>';
				}
				else
				{
					$active = '<label class="radio-inline"><input data-id="'.$news_id.'" type="radio" value="1" checked class="rbactive" name="rbactive'.$cnt.'">Active</label>';
					$active .= '<label class="radio-inline"><input data-id="'.$news_id.'" type="radio" value="0" class="rbactive" name="rbactive'.$cnt.'">Inactive</label>';
				}
				
				$item['news_active'] = $active;
				$news_photo = $data['news_photo'];
				$item['news_id'] = $data['id'];
				
				$link = $data['url'];
				$action = "";
				$action .= '<a data-object="'.$json_attr.'" href="javascript:void(0)" class="btn btn-edit-news btn-primary btn-sm"><i class="fa fa-pencil"></i></a>  ';
				$action .= '<a data-id="'.$news_id.'" href="javascript:void(0)" class="btn btn-delete-news btn-danger btn-sm"><i class="fa fa-times"></i>';
				$item['action'] = $action;
				if(isset($jsonobj['news_photo_path']))
				{
					$item['news_photo'] = '<img  style="width: 60px; height:auto" src="'.$news_photo.'" alt="'.$item['news_title'].'" />';
				}
				else
				{
					$item['news_photo'] = "";
				}
				
				$item['news_url'] = '<a  href="' . $link . '">' . $link . '</a>';
				$ret[] = $item;
				$cnt++;
			}
		}
	}
	if(count($ret) > 0)
	{
		echo '{"aaData": ' . json_encode($ret) . '}';
	}
	else
    {
        echo '{
					    "sEcho": 1,
					    "iTotalRecords": "0",
					    "iTotalDisplayRecords": "0",
					    "aaData": []
					}';
        exit;
    }
}
  function activenews()
	{
		global $db;
		if (!isset($db))
		{
			include_once ("class.db.php");
			// MySQL
			$db = new db(DB_DSN, DB_USER, DB_PASSWORD);
		}
		
		try 
		{
			
			$news_id = isset($_GET['id'])?$_GET['id']:"";
			$active = isset($_GET['active'])?$_GET['active']:"";
			if (trim($news_id) == "" || trim($active) == "") 
			{
				throw new Exception('Invalid data');
			}
			
			 #Delete news
		    $sql="UPDATE news SET active = :active WHERE id = :id";
          	$stmt =  $db->prepare($sql);
    		$stmt->bindParam(':id', $news_id , PDO::PARAM_STR); 
    		$stmt->bindParam(':active', $active , PDO::PARAM_STR); 
 			$stmt->execute();
 			
			$data = array(
				'success' => true,
				'message' => 'Updated Sucessfully'
			);
			
			
		}

		catch(Exception $e) {
			$data = array(
				'success' => false,
				'message' => $e->getMessage()
			);
		}

		echo json_encode($data);
		exit();
	}
 function deletenews()
	{
		global $db;
		if (!isset($db))
		{
			include_once ("class.db.php");
			// MySQL
			$db = new db(DB_DSN, DB_USER, DB_PASSWORD);
		}
		
		try 
		{
			
			$news_id = isset($_GET['id'])?$_GET['id']:"";
			if (trim($news_id) == "") 
			{
				throw new Exception('Invalid data');
			}
			
			 #Delete news
		    $sql="DELETE FROM news WHERE id = :id";
          	$stmt =  $db->prepare($sql);
    		$stmt->bindParam(':id', $news_id , PDO::PARAM_STR); 
 			$stmt->execute();
 			
			$data = array(
				'success' => true,
				'message' => 'Deleted Sucessfully'
			);
			
			
		}

		catch(Exception $e) {
			$data = array(
				'success' => false,
				'message' => $e->getMessage()
			);
		}

		echo json_encode($data);
		exit();
	}

function savenews()
{
	global $db;
	if (!isset($db))
	{
		include_once ("class.db.php");
		// MySQL
		$db = new db(DB_DSN, DB_USER, DB_PASSWORD);
	}

	try
	{
		$uploaddir = "img/news/";
		if (!is_dir($uploaddir))
		{
			mkdir($uploaddir);
		}

		$news_title = isset($_POST['news_title']) ? $_POST['news_title'] : "";
		$news_date = isset($_POST['news_date']) ? $_POST['news_date'] : "";
		if ($news_date != "")
		{
			$news_date = date('Y-m-d', strtotime($news_date));
		}

		$news_link = isset($_POST['news_link']) ? $_POST['news_link'] : "";
		$news_desc = isset($_POST['news_desc']) ? $_POST['news_desc'] : "";
		$news_id = isset($_POST['news_id']) ? $_POST['news_id'] : "";
		$db->beginTransaction();
		if (checknewsexist($news_title, $news_id))
		{
			throw new Exception('News title already exists');
		}

		if ($news_id != "")
		{
			$sql = "UPDATE news SET
								title = :title,
								published_at = :published_at,
								url = :url,
								description = :description
						WHERE  id = :id";
			$stmt = $db->prepare($sql);
			$stmt->bindParam(':title', $news_title, PDO::PARAM_STR);
			$stmt->bindParam(':published_at', $news_date, PDO::PARAM_STR);
			$stmt->bindParam(':url', $news_link, PDO::PARAM_STR);
			$stmt->bindParam(':description', $news_desc, PDO::PARAM_STR);
			$stmt->bindParam(':id', $news_id, PDO::PARAM_STR);
			if (!$stmt->execute())
			{
				throw new Exception('Problem in insert news <br/>' . implode(":", $stmt->errorInfo()));
			}
		}
		else
		{
			$sql = "INSERT into news(
								title,
								published_at,
								url,
								description
								) 
								values
								(
								:title,
								:published_at,
								:url,
								:description
								)";
			$stmt = $db->prepare($sql);
			$stmt->bindParam(':title', $news_title, PDO::PARAM_STR);
			$stmt->bindParam(':published_at', $news_date, PDO::PARAM_STR);
			$stmt->bindParam(':url', $news_link, PDO::PARAM_STR);
			$stmt->bindParam(':description', $news_desc, PDO::PARAM_STR);
			if (!$stmt->execute())
			{
				throw new Exception('Problem in insert news <br/>' . implode(":", $stmt->errorInfo()));
			}

			$news_id = $db->lastInsertId();
		}

		if (isset($_FILES['news_photo']) && !empty($_FILES['news_photo']['name']))
		{
			$filename = stripslashes($_FILES['news_photo']['name']);
			$extension = pathinfo($filename, PATHINFO_EXTENSION);
			$extension = strtolower($extension);
			if (($extension != "jpg") && ($extension != "jpeg") && ($extension != "png") && ($extension != "gif"))
			{
				throw new Exception("Unknown Image extension!");
			}
			else
			{
				$maxsize = 2097152;
				if (($_FILES['news_photo']['size'] >= $maxsize) || ($_FILES["news_photo"]["size"] == 0))
				{
					throw new Exception("File must be less than 2 megabytes.");
				}


				$file_name = $news_id; 
				$news_photo_path = $uploaddir . $file_name . '.' . $extension;
				if (file_exists($news_photo_path))
				{
					unlink($news_photo_path);
				}

				if (!move_uploaded_file($_FILES['news_photo']['tmp_name'], $news_photo_path))
				{
					$status = false;
					$msg = "There was an error uploading the photo, please try again!";
					throw new Exception($msg);
				}
				else
				{
					$sql = "UPDATE news SET
                        news_photo = :news_photo
           				WHERE id = :id";
					$stmt = $db->prepare($sql);
					$stmt->bindParam(':news_photo', $news_photo_path, PDO::PARAM_STR);
					$stmt->bindParam(':id', $news_id, PDO::PARAM_STR);
					if (!$stmt->execute())
					{
						throw new Exception('Problem in update news photo<br/>' . implode(":", $stmt->errorInfo()));
					}
				}
			}
		}

		$db->commit();
		$data = array(
			'success' => true,
			'message' => "Saved Sucessfully"
		);
		echo json_encode($data);
		exit();
	}

	catch(Exception $e)
	{

		// An exception has been thrown
		// We must rollback the transaction

		$db->rollback();
		$data = array(
			'success' => false,
			'message' => $e->getMessage()
		);
		echo json_encode($data);
		exit();
	}
}

function getalertslist()
{
	global $db;
	if (!isset($db))
	{
		include_once ("class.db.php");

		// MySQL

		$db = new db(DB_DSN, DB_USER, DB_PASSWORD);
	}

	$sql = "SELECT * , DATE_FORMAT(GA.published_at,'%b %d %Y') as date FROM g_alerts AS GA";
	$result = $db->prepare($sql);
	$ret = array();
	if ($result->execute())
	{
		$alert_list = $result->fetchAll(PDO::FETCH_ASSOC);
		$cnt = 0;
		if (count($alert_list))
		{
			foreach($alert_list as $data)
			{
				
				$item['title'] = $data['title'];
				$item['date'] = $data['date'];
				$item['description'] = $data['description'];
				$alert_id =  $data['id'];
				$style = "";
				if(strlen($data['description']) > 400)
				{
					$style = "height:100px;overflow-y: scroll";
				}
				$item['desc'] = '<div style="'.$style.'" class="text-truncate">'.$data['description'].'</div>';
				
				if($data['active'] == 0)
				{
				$active = '<label class="radio-inline"><input data-id="'.$alert_id.'" type="radio" value="1" class="rbactive" name="rbactive'.$cnt.'">Active</label>';
				$active .= '<label class="radio-inline"><input data-id="'.$alert_id.'" type="radio" value="0" checked class="rbactive" name="rbactive'.$cnt.'">Inactive</label>';
				}
				else
				{
					$active = '<label class="radio-inline"><input data-id="'.$alert_id.'" type="radio" value="1" checked class="rbactive" name="rbactive'.$cnt.'">Active</label>';
					$active .= '<label class="radio-inline"><input data-id="'.$alert_id.'" type="radio" value="0" class="rbactive" name="rbactive'.$cnt.'">Inactive</label>';
				}
				
				
				
				
				
				$item['active'] = $active;
				$item['alert_id'] = $data['id'];
				$link = $data['url'];
				
				$item['url'] = '<a  href="' . $link . '">Click here to view </a>';
				$ret[] = $item;
				$cnt++;
			}
		}
	}

	if(count($ret) > 0)
	{
		echo '{"aaData": ' . json_encode($ret) . '}';
	}
	else
    {
        echo '{
					    "sEcho": 1,
					    "iTotalRecords": "0",
					    "iTotalDisplayRecords": "0",
					    "aaData": []
					}';
        exit;
    }
}
 function activealerts()
	{
		global $db;
		if (!isset($db))
		{
			include_once ("class.db.php");
			// MySQL
			$db = new db(DB_DSN, DB_USER, DB_PASSWORD);
		}
		
		try 
		{
			
			$alerts_id = isset($_GET['id'])?$_GET['id']:"";
			$active = isset($_GET['active'])?$_GET['active']:"";
			if (trim($alerts_id) == "" || trim($active) == "") 
			{
				throw new Exception('Invalid data');
			}
			
			 #Delete news
		    $sql="UPDATE g_alerts SET active = :active WHERE id = :id";
          	$stmt =  $db->prepare($sql);
    		$stmt->bindParam(':id', $alerts_id , PDO::PARAM_STR); 
    		$stmt->bindParam(':active', $active , PDO::PARAM_STR); 
 			$stmt->execute();
 			
			$data = array(
				'success' => true,
				'message' => 'Updated Sucessfully'
			);
			
			
		}

		catch(Exception $e) {
			$data = array(
				'success' => false,
				'message' => $e->getMessage()
			);
		}

		echo json_encode($data);
		exit();
	}

?>