<?php
require_once ('includes/config.php');
if (!isset($db))
{
	include_once ("includes/class.db.php");
	// MySQL
	$db = new db(DB_DSN, DB_USER, DB_PASSWORD);
}
try
{
$feed = implode(file('https://www.google.co.in/alerts/feeds/15007694549636809483/9191993167392171881'));
$xml = simplexml_load_string($feed);
$ret = array();

foreach($xml->entry as $entry)
{
	$title = (string) $entry->title;
	$published = (string) $entry->published;
	$published = date('Y-m-d',strtotime($published));
	$description = (string) $entry->content;
	$url = (string) $entry->link['href'];
	$feed_id = (string) $entry->id;
	$sql = "SELECT * FROM g_alerts AS GA WHERE GA.feed_id = :feed_id";
	$q = $db->prepare($sql);
	$q->bindParam(':feed_id', $feed_id, PDO::PARAM_STR);
	if ($q->execute()) {
			if ($q->fetchColumn() > 0) {
				//update
				$sql = "UPDATE g_alerts SET
									title = :title,
									published_at = :published_at,
									url = :url,
									description = :description
							WHERE  feed_id = :feed_id";
				$stmt = $db->prepare($sql);
				$stmt->bindParam(':title', $title, PDO::PARAM_STR);
				$stmt->bindParam(':published_at', $published, PDO::PARAM_STR);
				$stmt->bindParam(':url', $url, PDO::PARAM_STR);
				$stmt->bindParam(':description', $description, PDO::PARAM_STR);
				$stmt->bindParam(':feed_id', $feed_id, PDO::PARAM_STR);
				if (!$stmt->execute())
				{
					throw new Exception('Problem in insert google alerts <br/>' . implode(":", $stmt->errorInfo()));
				}
			}
			else 
			{
				//insert
				$sql = "INSERT into g_alerts(
				          feed_id,
				          title,
				          published_at,
				          url,
				          description
				          ) 
				          values
				          (
				          :feed_id,
				          :title,
				          :published_at,
				          :url,
				          :description
				          )";
				          
				 $stmt = $db->prepare($sql);
				$stmt->bindParam(':title', $title, PDO::PARAM_STR);
				$stmt->bindParam(':published_at', $published, PDO::PARAM_STR);
				$stmt->bindParam(':url', $url, PDO::PARAM_STR);
				$stmt->bindParam(':description', $description, PDO::PARAM_STR);
				$stmt->bindParam(':feed_id', $feed_id, PDO::PARAM_STR);
				if (!$stmt->execute())
				{
					throw new Exception('Problem in insert google alerts <br/>' . implode(":", $stmt->errorInfo()));
				}         
				          
				
			}
		}
}
  $data = array(
				'success' => true,
				'message' => 'Google alerts updated'
			);
}
catch(Exception $e) {
			$data = array(
				'success' => false,
				'message' => $e->getMessage()
			);
		}

echo json_encode($data);
exit;
?>