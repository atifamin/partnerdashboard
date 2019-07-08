<?php
/*$feed = implode(file('https://www.google.co.in/alerts/feeds/15007694549636809483/9191993167392171881'));
$xml = simplexml_load_string($feed);
$ret = array();
foreach($xml->entry as $entry)
{
	$item['title'] = (string) $entry->title;
	$item['published'] = (string) $entry->published;
	$item['description'] = (string) $entry->content;
	$item['url'] = (string) $entry->link['href'];
	$ret[] = $item;
}
*/
//get custom active news
require_once ('config_news.php');
// if (!isset($db))
// {
// 	include_once ("class.db.php");
// 	// MySQL
// 	$db = new db(DB_DSN, DB_USER, DB_PASSWORD);
// }

$sql = "SELECT * , DATE_FORMAT(N.published_at,'%b %d %Y') as news_date FROM news AS N WHERE N.active = 1";
//$result = $db->prepare($sql);
$result = mysqli_query($con_AWT,$sql) or die(mysqli_error()); 
//echo "<pre>";print_r($result);exit;
//if ($result->execute())
if(mysqli_num_rows($result)>0)
{
	//$news_list = mysqli_fetch_array($result);
	//echo "<pre>";print_r($news_list);exit;
	if (count($result))
	{
		// foreach($news_list as $data)
		// {
		// 	// $item['title'] = $data['title'];
		// 	// $item['published'] = $data['news_date'];
		// 	// $item['description'] = $data['description'];
		// 	// $item['url'] = $data['url'];
		// 	// $ret[] = $item;
		// 	$item[] = array(
		// 		"title" => $data['title'],
		// 		"published" => $data['news_date'],
		// 		"description" => $data['description'],
		// 		"url" => $data['url']
		// 	);
		// }
		while($news_list = mysqli_fetch_array($result)){

			$item['title'] = $news_list['title'];
			$item['published'] = $news_list['news_date'];
			$item['description'] = $news_list['description'];
			$item['url'] = $news_list['url'];
			$ret[] = $item;
		}
	}
}
// $sql = "SELECT * , DATE_FORMAT(GA.published_at,'%b %d %Y') as news_date FROM g_alerts AS GA WHERE GA.active = 1";
// $result = $db->prepare($sql);
// if ($result->execute())
// {
// 	$news_list = $result->fetchAll(PDO::FETCH_ASSOC);
// 	if (count($news_list))
// 	{
// 		foreach($news_list as $data)
// 		{
// 			$item['title'] = $data['title'];
// 			$item['published'] = $data['news_date'];
// 			$item['description'] = $data['description'];
// 			$item['url'] = $data['url'];
// 			$ret[] = $item;
// 		}
// 	}
// }

//echo "<pre>";print_r($ret);exit;
$json = json_encode($ret);

echo $json;
//echo "<pre>";print_r($news_list);

exit;
?>