<?php
    define ('DB_DSN', 'mysql:host=localhost;dbname=calrebui_newsDEV');
	define ('DB_USER', 'calrebui_newsDEV');
	define ('DB_PASSWORD', 'nnVO3x7hhUi');
	$db;
	if ( !isset( $db ) )
    {
		include_once( "class.db.php" );
		//MySQL
		$db = new db(DB_DSN, DB_USER ,DB_PASSWORD );
		 
	}
	
	

	
	
?>