<?php
    define ('DB_DSN', 'mysql:host=localhost;dbname=tecriak_news');
	define ('DB_USER', 'tecriak_bala');
	define ('DB_PASSWORD', 'tecriak@2015');
	$db;
	if ( !isset( $db ) )
    {
		include_once( "class.db.php" );
		//MySQL
		$db = new db(DB_DSN, DB_USER ,DB_PASSWORD );
		 
	}
	
	

	
	
?>